<?php

namespace App\Filament\Resources\DoctorMasterResource\Pages;

use App\Filament\Resources\DoctorMasterResource;
use App\Imports\DoctorMasterImport;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Pages\Page;
use Maatwebsite\Excel\Facades\Excel;

class ImportDoctorMaster extends Page
{
    protected static string $resource = DoctorMasterResource::class;

    protected static string $view = 'filament.resources.doctor-master-resource.pages.import-doctor-master';

    public $doctorMasterFile;

    protected function getFormSchema(): array
    {
        return [
            FileUpload::make('doctorMasterFile')
                ->required()
                ->label('Upload File')
                ->reactive(),
        ];
    }

    public function import()
    {
        $file = '';

        foreach ($this->doctorMasterFile as $doctorMaster) {
            $file = $doctorMaster->store('csv', 'local');
        }

        try {
            Excel::import(new DoctorMasterImport(), $file);
            $this->notify('success', 'Imported Successfully');
        } catch (\Illuminate\Validation\ValidationException $exception) {
            foreach ($exception->errors() as $error) {

                // Find which row in error message
                preg_match_all('!\d+!', $error[0], $row);

                // Replace number+. in error message
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
