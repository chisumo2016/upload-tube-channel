<?php

namespace App\Http\Controllers;

use App\Jobs\UploadImage;
use App\Models\Channel;
use Illuminate\Http\Request;
use App\Http\Requests\ChannelUpdateRequest;



class ChannelSettingsController extends Controller
{
    //
    public function  edit(Channel $channel)
    {
        $this->authorize('edit', $channel);
        return view('channel.settings.edit',[
            'channel' =>$channel
        ]);
    }

    public  function update(ChannelUpdateRequest $request, Channel  $channel)
    {
         $this->authorize('update', $channel);

         $channel->update([
             'name' => $request -> name,
             'slug' =>$request ->slug,
             'description' => $request->description

         ]);

         //Upload image

        if ($request->file('image')){
            //Move to temp location  b

            $request->file('image')->move(storage_path(). '/uploads', $fileId = uniqid(true));

            $this->dispatch(new UploadImage($channel, $fileId));
        }
         return redirect()->to("/channel/{$channel->slug}/edit");
         //die('update');
    }
}
