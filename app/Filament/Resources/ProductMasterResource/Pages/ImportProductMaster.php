<?php

namespace App\Filament\Resources\ProductMasterResource\Pages;

use App\Filament\Resources\ProductMasterResource;
use App\Imports\ProductMasterImport;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Pages\Page;
use Maatwebsite\Excel\Facades\Excel;

class ImportProductMaster extends Page
{
    protected static string $resource = ProductMasterResource::class;

    protected static string $view = 'filament.resources.product-master-resource.pages.import-product-master';

    public $productMasterFile;

    protected function getFormSchema(): array
    {
        return [
            FileUpload::make('productMasterFile')
                ->required()
                ->label('Upload File')
                ->reactive(),
        ];
    }

    public function import()
    {
        $file = '';

        foreach ($this->productMasterFile as $doctorMaster) {
            $file = $doctorMaster->store('csv', 'local');
        }

        try {
            Excel::import(new ProductMasterImport(), $file);
            $this->notify('success', 'Imported Successfully');
        } catch (\Illuminate\Validation\ValidationException $exception) {
            foreach ($exception->errors() as $error) {

                // Find which row in error message
                preg_match_all('!\d+!', $error[0], $row);

                // Replace number and . in error message
                $words = preg_replace('/[0-9]+./', '', $error[0]);

                // Create Custom error message
                $message = 'Error from row number '.$row[0][0] + 2 .' . '.$words;

                // Notify Error Message
                $this->notify('danger', $message);
            }
        }

        return redirect(url(static::$resource::getUrl('index')));
    }
}
