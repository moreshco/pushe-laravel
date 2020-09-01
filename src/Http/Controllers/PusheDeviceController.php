<?php

namespace Moreshco\PusheLaravel\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Moreshco\PusheLaravel\Models\Device;

class PusheDeviceController extends Controller
{
    public function saveDevice(Request $request){
        $userId = $request->get('user_id');
        $deviceId = $request->get('device_id');
        $androidId = $request->get('android_id');
        $device = Device::where('device_id', $deviceId)->first();
        if(!empty($device)){
            DB::table('device_user')->insertOrIgnore(
                ['user_id' => $userId, 'device_id' => $device->id]
            );
        }else{
            $newDevice = new Device();
            $newDevice->device_id = $deviceId;
            $newDevice->android_id = $androidId;
            $newDevice->save();
            DB::table('device_user')->insertOrIgnore(
                ['user_id' => $userId, 'device_id' => $newDevice->id]
            );
        }
    }
}
