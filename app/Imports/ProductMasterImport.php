<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\DoctorMaster;
use App\Models\ItemType;
use App\Models\Prescription;
use App\Models\Product;
use App\Models\ProductMaster;
use App\Models\State;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductMasterImport implements ToCollection, WithHeadingRow
{
    public function createState($name): Model|DoctorMaster|null
    {
        return State::create([
            'state' => $name,
        ]);
    }

    public function searchState($name): Model|DoctorMaster|null
    {
        $state = State::where('state', '=', strtoupper($name))->first();

        if ($state == null) {
            $state = $this->createState($name);
        }

        return $state;
    }

    public function createItemType($type): Model|DoctorMaster|null
    {
        return ItemType::create([
            'type' => $type,
        ]);
    }

    public function searchItemType($type): Model|DoctorMaster|null
    {
        $item_type = ItemType::where('type', '=', strtoupper($type))->first();

        if ($item_type == null) {
            $item_type = $this->createItemType(strtoupper($type));
        }

        return $item_type;
    }

    public function createCategory($category_name): Model|DoctorMaster|null
    {
        return Category::create([
            'category' => $category_name,
        ]);
    }

    public function searchCategory($category_name): Model|DoctorMaster|null
    {
        $category = Category::where('category', '=', strtoupper($category_name))->first();
        if ($category == null) {
            $category = $this->createCategory(strtoupper($category_name));
        }
        $category = Category::where('category', '=', strtoupper($category_name))->first();

        return $category;
    }

    public function createPrescription($prescribed_for): Model|DoctorMaster|null
    {
        return Prescription::create([
            'prescribed_for' => $prescribed_for,
        ]);
    }

    public function searchPrescription($prescribed_for): Model|DoctorMaster|null
    {
        $prescription = Prescription::where('prescribed_for', '=', strtoupper($prescribed_for))->first();
        if ($prescription == null) {
            $prescription = $this->createPrescription(strtoupper($prescribed_for));
        }

        return $prescription;
    }

    public function createProduct($prescription_id, $product_name, $item_type_id, $category_type_id): Model|DoctorMaster|null
    {
        return Product::create([
            'prescription_id' => $prescription_id,
            'name' => $product_name,
            'item_type_id' => $item_type_id,
            'category_id' => $category_type_id,
        ]);
    }

    public function searchProduct($prescription_id, $product_name, $item_type_id, $category_type_id): Model|DoctorMaster|null
    {
        $product = Product::where('name', '=', strtoupper($product_name))->where('prescription_id', '=', $prescription_id)->first();
        if ($product == null) {
            $product = $this->createProduct($prescription_id, strtoupper($product_name), $item_type_id, $category_type_id);
        }

        return $product;
    }

    public function createProductMaster($product_id, $state_id, $mrp, $pts, $ptr): Model|DoctorMaster|null
    {
        return ProductMaster::create([
            'product_id' => $product_id,
            'state_id' => $state_id,
            'mrp' => $mrp,
            'pts' => $pts,
            'ptr' => $ptr,
        ]);
    }

    public function searchProductMaster($product_id, $state_id, $mrp, $pts, $ptr): Model|DoctorMaster|null
    {
        $product_master = ProductMaster::where('product_id', '=', $product_id)->where('state_id', '=', $state_id)->first();
        if ($product_master == null) {
            $product_master = $this->createProductMaster(strtoupper($product_id), $state_id, $mrp, $pts, $ptr);
        }

        return $product_master;
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(),
            [
                '*.state' => 'required',
                '*.item_type' => 'required',
                '*.category' => 'required',
                '*.brand_name' => 'required',
                '*.mrp' => 'required',
                '*.pts' => 'required',
                '*.ptr' => 'required',
                '*.prescribed_for' => 'required',

            ]
        )->validate();

        foreach ($rows as $row) {
            $state = $this->searchState($row['state']);
            $item_type = $this->searchItemType($row['item_type']);
            $category = $this->searchCategory($row['category']);
            $prescription = $this->searchPrescription($row['prescribed_for']);
            $product = $this->searchProduct($prescription->id, $row['brand_name'], $item_type->id, $category->id);
            $this->searchProductMaster($product->id, $state->id, $row['mrp'], $row['pts'], $row['ptr']);
        }
    }
}
