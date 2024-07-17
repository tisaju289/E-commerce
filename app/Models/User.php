<?php
namespace App\Models;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;



class User extends Model
{
    use HasRoles;
    protected $fillable = ['email','otp'];

    public function profile(): HasOne
    {
        return $this->hasOne(CustomerProfile::class);
    }
}
