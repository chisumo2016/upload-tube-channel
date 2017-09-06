<?php

namespace App\Jobs;
use App\Models\Channel;
use File;
use Storage;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UploadImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public  $channel;
    public $fileId;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($channel , $fileId )
    {
        //
        $this->channel = $channel;
        $this->file = $fileId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        //Get Image
        $path = storage_path() . '/uploads/' . $this->fileId;
        $fileName = $this->fileId . '.png';   //resize

         if (Storage::disk('s3images')->put('profile/' . $fileName, fopen($path, 'r+'))){

             File::delete($path);
         }

        $this->channel->image_filename = $fileName;
         $this->channel->save();

        //get the image
        //resize
        //upload to s3
        //delete file
        //update channel image

//        if (!empty($this->channel)) {
//            $this->channel->image_filename = $fileName;
//        }
    }
}
