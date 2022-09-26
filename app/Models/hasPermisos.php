<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Permiso;
use App\Models\Role;
use App\Models\Permisionable;

trait hasPermisos {

    public function puede($user,$tabla,$accion) {
        
        $user = $user ?: auth()->user();
        $permiso = Permiso::where('nombre','=',$tabla)->first();
        
        if($permiso) 
        {    
            $rouls = [];
            foreach($user->roles as $rolito)
                $rouls[] = $rolito->id;            

            $permisoRol = Permisionable::where('permiso_id','=',$permiso->id);
            $permisoRol = $permisoRol->where('permisionable_type','=','App\Models\Role');
            $permisoRol = $permisoRol->whereIn('permisionable_id',$rouls);
            $permisoRol = $permisoRol->select('permisionables.'.$accion.' as permiso')->first();            
                        
            if($permisoRol && $permisoRol->permiso)
                return $permisoRol->permiso;

            $permisoUser = Permisionable::where('permiso_id','=',$permiso->id);
            $permisoUser = $permisoUser->where('permisionable_type','=','App\Models\User');
            $permisoUser = $permisoUser->where('permisionable_id','=',$user->id);
            $permisoUser = $permisoUser->select('permisionables.'.$accion.' as permiso')->first();

            if($permisoUser && $permisoUser->permiso)
                return $permisoUser->permiso;  
            
            return false;
        }
        else
            return false;

    }

    public function darRole($newRole) {
        try {
            $role = Role::where('rol', $newRole)->first();

            if ($role->id == $this->role_id) {
                return $this;
            }

            $this->role_id = $role->id;
            $this->save();
            //$this->log($this->id, 'App\User', 4000, Auth::id(), null, $newRole);
            return $this;
        } catch (\Throwable $th) {
            //$this->log($this->id, 'App\Error', 5001, Auth::id(), null, $newRole);
        }
    }

    public function role() {
        return $this->belongsTo('App\Models\Role');
    }

    public function users() {
        return $this->hasMany('App\Models\User');
    }

    public function permisos() {
        return $this->morphToMany(Permiso::class, 'permisionable')->withTimestamps();
    }
}
