<?php

namespace App\Imports;

use App\Models\AreaManager;
use App\Models\Billing;
use App\Models\DoctorMaster;
use App\Models\HeadQuarter;
use App\Models\Patch;
use App\Models\SalesManager;
use App\Models\Specialist;
use App\Models\State;
use App\Models\Stockist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DoctorMasterImport implements ToCollection, WithHeadingRow
{
    public function createHeadQuarter($state_id, $hq_name, $code)
    {
        return HeadQuarter::create([
            'location' => $hq_name,
            'code' => $code,
            'state_id' => $state_id,
        ]);
    }

    public function searchHeadQuarter($state_id, $hq_name, $code)
    {
        $head_quarter = HeadQuarter::where('location', '=', strtoupper($hq_name))->where('state_id', '=', $state_id)->first();

        if ($head_quarter == null) {
            $head_quarter = $this->createHeadQuarter($state_id, $hq_name, $code);
        }

        return $head_quarter;
    }

    public function createState($name): Model|DoctorMaster|null
    {
        return State::create([
            'state' => $name,
        ]);
    }

    public function searchState($name)
    {
        $state = State::where('state', '=', strtoupper($name))->first();

        if ($state == null) {
            $state = $this->createState($name);
        }

        return $state;
    }

    public function createPatch($name, $id): Model|DoctorMaster|null
    {
        return Patch::create([
            'patch' => $name,
            'head_quarter_id' => $id,
        ]);
    }

    public function searchPatch($name, $id)
    {
        $patch = Patch::where('patch', '=', strtoupper($name))->where('head_quarter_id', '=', $id)->first();

        if ($patch == null) {
            $patch = $this->createPatch($name, $id);
        }

        return $patch;
    }

    public function createBilling($billingName, $doctorName, $id, $specialist_id): Model|DoctorMaster|null
    {
        return Billing::create([
            'patch_id' => $id,
            'billing_name' => $billingName,
            'doctor_name' => $doctorName,
            'specialist_id' => $specialist_id,
        ]);
    }

    public function searchBilling($billingName, $doctorName, $id, $specialist_id)
    {
        $billing = Billing::where('billing_name', '=', strtoupper($billingName))->where('doctor_name', '=', $doctorName)->where('patch_id', '=', $id)->where('specialist_id', '=', $specialist_id)->first();

        if ($billing == null) {
            $billing = $this->createBilling($billingName, $doctorName, $id, $specialist_id);
        }

        return $billing;
    }

    public function createSalesManager($area_manager_id, $head_quarter_id, $name, $email): Model|DoctorMaster|null
    {
        return SalesManager::create([
            'area_manager_id' => $area_manager_id,
            'head_quarter_id' => $head_quarter_id,
            'name' => $name,
            'email' => $email,
        ]);
    }

    public function searchSalesManager($area_manager_id, $head_quarter_id, $name, $email)
    {
        $salesManager = SalesManager::where('name', '=', strtoupper($name))->where('head_quarter_id', '=', $head_quarter_id)->where('area_manager_id', '=', $area_manager_id)->first();

        if ($salesManager == null) {
            $salesManager = $this->createSalesManager($area_manager_id, $head_quarter_id, $name, $email);
        }

        return $salesManager;
    }

    public function createAreaManager($state_id, $name, $email): Model|DoctorMaster|null
    {
        return AreaManager::create([
            'state_id' => $state_id,
            'name' => $name,
            'email' => $email,
        ]);
    }

    public function searchAreaManager($state_id, $name, $email)
    {
        $area_manager = AreaManager::where('name', '=', strtoupper($name))->where('state_id', '=', $state_id)->first();

        if ($area_manager == null) {
            $area_manager = $this->createAreaManager($state_id, $name, $email);
        }

        return $area_manager;
    }

    public function createStockist($sales_manager_id, $name, $email): Model|DoctorMaster|null
    {
        return Stockist::create([
            'sales_manager_id' => $sales_manager_id,
            'name' => $name,
            'email' => $email,
        ]);
    }

    public function searchStockist($sales_manager_id, $name, $email)
    {
        $stockist = Stockist::where('name', '=', strtoupper($name))->where('sales_manager_id', '=', $sales_manager_id)->first();

        if ($stockist == null) {
            $stockist = $this->createStockist($sales_manager_id, $name, $email);
        }

        return $stockist;
    }

    public function searchDoctorMaster($billing_id, $stockist_id)
    {
        $doctor_master = DoctorMaster::where('billing_id', '=', $billing_id)->where('stockist_id', '=', $stockist_id)->first();

        if ($doctor_master == null) {
            $doctor_master = DoctorMaster::create([
                'billing_id' => $billing_id,
                'stockist_id' => $stockist_id,
            ]);
        }

        return $doctor_master;
    }

    public function createSpecialist($specialist_in): Model|DoctorMaster|null
    {
        return Specialist::create([
            'specialist_in' => $specialist_in,

        ]);
    }

    public function searchSpecialist($specialist_in)
    {
        $specialists = Specialist::where('specialist_in', '=', $specialist_in)->first();

        if ($specialists == null) {
            $specialists = $this->createSpecialist($specialist_in);
        }

        return $specialists;
    }

    public function headingRow(): int
    {
        return 1;
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(),
            [
                '*.state' => 'required',
                '*.hq_name' => 'required',
                '*.hq_code' => 'required',
                '*.patch' => 'required',
                '*.billing_name' => 'required',
                '*.doctor_name' => 'required',
                '*.sales_manager' => 'required',
                '*.sm_email' => 'required',
                '*.stockist' => 'required',
                '*.stockist_email' => 'required',
            ]
        )->validate();

        foreach ($rows as $row) {
            $state = $this->searchState($row['state']);

            $head_quarter = $this->searchHeadQuarter($state->id, $row['hq_name'], $row['hq_code']);

            $patch = $this->searchPatch($row['patch'], $head_quarter->id);

            $specialists = $this->searchSpecialist($row['specialist']);

            $billing = $this->searchBilling($row['billing_name'], $row['doctor_name'], $patch->id, $specialists->id);

            $area_manager = $this->searchAreaManager($state->id, $row['area_manager'], $row['am_email']);

            $salesManager = $this->searchSalesManager($area_manager->id, $head_quarter->id, $row['sales_manager'], $row['sm_email']);

            $stockist = $this->searchStockist($salesManager->id, $row['stockist'], $row['stockist_email']);

            $this->searchDoctorMaster($billing->id, $stockist->id);
        }
    }
}
