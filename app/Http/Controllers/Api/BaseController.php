<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Maatwebsite\Excel\Facades\Excel;

abstract class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function getAuthUserId()
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            
            if (!$user) {
                throw new \Exception('User not authenticated', 401);
            }
            
            return $user->id;
        } catch (JWTException $e) {
            throw new \Exception('Invalid or expired token', 401);
        }
    }

    protected function getAuthUser()
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            
            if (!$user) {
                throw new \Exception('User not authenticated', 401);
            }
            
            return $user;
        } catch (JWTException $e) {
            throw new \Exception('Invalid or expired token', 401);
        }
    }

    /**
     * Export data to Excel
     * 
     * @param mixed $data Collection or array of data
     * @param string $fileName Name of the file without extension
     * @param string $sheetName Name of the sheet
     * @param array $columns Array of column mappings ['Column Name' => 'field_name']
     */
    protected function exportToExcel($data, $fileName, $sheetName, array $columns)
    {
        try {
            $exportData = [];
            
            foreach ($data as $item) {
                $row = [];
                foreach ($columns as $columnName => $fieldPath) {
                    $value = $item;
                    foreach (explode('.', $fieldPath) as $key) {
                        $value = $value->{$key} ?? null;
                    }
                    $row[$columnName] = $value;
                }
                $exportData[] = $row;
            }
            
            Excel::create($fileName, function($excel) use ($exportData, $sheetName) {
                $excel->sheet($sheetName, function($sheet) use ($exportData) {
                    $sheet->fromArray($exportData);
                });
            })->export('xlsx');
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to export data',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}