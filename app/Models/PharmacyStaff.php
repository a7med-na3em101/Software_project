<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class PharmacyStaff extends Authenticatable
{
    use HasFactory;

    protected $table = 'pharmacy_staff';
    protected $fillable = ['name', 'phone', 'email', 'address', 'password'];

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }
    public function trainings()
    {
        return $this->belongsToMany(TrainingAndSupport::class, 'pharmacy_staff_training');
    }

    public function medicines()
    {
        return $this->belongsToMany(MedicineData::class, 'pharmacy_staff_medicine');
    }
}
