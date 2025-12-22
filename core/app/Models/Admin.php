<?php

namespace App\Models;


use App\Traits\GlobalStatus;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use GlobalStatus, HasRoles, SoftDeletes;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $guard_name = 'admin';

    public function imageSrc(): Attribute
    {
        return new Attribute(
            get: fn() => $this->image  ? getImage(getFilePath('adminProfile') . '/' . $this->image, getFileSize('adminProfile')) : siteFavicon(),
        );
    }

    public function activities()
    {
        return $this->hasMany(AdminActivity::class, 'admin_id');
    }
}
