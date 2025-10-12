<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Str;
class SubjectCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        
  
  return [
            'data' => $this->collection->map(function ($data) {
                // Create an array to store the mock papers' data
                $mockPapers = [];

                // Check if paper_1 exists and add it to the mock papers array
                if ($data->paper_1) {
                    $mockPapers[] = [
                        'paper_1' => true,
                        'date' => date('Y-m-d'), // Replace this with the actual date
                    ];
                }

                // Check if paper_2 exists and add it to the mock papers array
                if ($data->paper_2) {
                    $mockPapers[] = [
                        'paper_2' => true,
                        'date' => date('Y-m-d'), // Replace this with the actual date
                    ];
                }

                // Check if paper_3 exists and add it to the mock papers array
                if ($data->paper_3) {
                    $mockPapers[] = [
                        'paper_3' => true,
                        'date' => date('Y-m-d'), // Replace this with the actual date
                    ];
                }

                // Check if paper_4 exists and add it to the mock papers array
                if ($data->paper_4) {
                    $mockPapers[] = [
                        'paper_4' => true,
                        'date' => date('Y-m-d'), // Replace this with the actual date
                    ];
                }

                return [
                    'has_mock_test' => $data->has_mock_test ? "true" : "false",
                    'mockPapers' => $mockPapers,
                    'subject' => $data->id,
                    'subject_name' => $data->subject_name,
                    'unit_code' => $data->unit_code,
                    'exam_board' => $data->exam_board,
                    'exam_type' => $data->exam_type,
                    'exam_fees' => $data->exam_fees,
                    'option_code' => json_decode($data->option_code_details),
                    'exam_booking_series' => $data->exam_booking_series,
                   
                ];
            }),
        ];
  
  
  
  
  
  
  
  
  
  

        // return [
        //     'data' => $this->collection->map(function($data) {
        //         return [
                    
        //             'subject' => $data->id,
        //             'exam_board' => $data->exam_board,
        //             'exam_type' => $data->exam_type,
        //             'subject_name' => $data->subject_name,
        //             'unit_code' => $data->unit_code,
        //             'exam_fees' => $data->exam_fees,
        //             'option_code' => json_decode($data->option_code_details),
        //             'exam_booking_series' => $data->exam_booking_series,
        //             'has_mock_test' => $data->has_mock_test ? "true" : "false",
        //             'paper_1' => $data->paper_1 ? "true" : "false", 
        //             'paper_2' => $data->paper_2 ? "true" : "false",
        //             'paper_3' => $data->paper_3 ? "true" : "false",
        //             'paper_4'=>$data->paper_4 ? "true" : "false",
                    

                    
        //         ];
        //     })
        // ];
           
    }
}
