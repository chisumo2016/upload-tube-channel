<?php

namespace  App\Http\viewComposers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class NavigationComposer
{
   public function compose(View $view) //bind
   {
         if (!Auth::check()){
             return;
         }

         $view->with('channel', Auth::user()->channel->first());
   }
}