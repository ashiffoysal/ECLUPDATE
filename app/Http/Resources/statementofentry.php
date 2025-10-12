<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Str;
class statementofentry extends ResourceCollection
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
            'data' => $this->collection->map(function($data) {
                return [
                    'booking_id' => $data->booking_id,
                    'candidate_email' => $data->candidate_email,
                    'exam_board_name' => $data->exam_board_name,
                    'file' => 'updatecore/public/'.$data->file,
                    'uploads_date' => $data->uploads_date,
                  
                    
                ];
            })
        ];
           
    }
}
