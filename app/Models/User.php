<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasFactory, Notifiable, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type', 'cr', 'address', 'contract_start', 'contract_end', 'to_name', 'to_phone', 'to_email',
        'fm_name', 'fm_phone', 'fm_email', 'c_insurance', 'wh_from', 'wh_to', 't_license',
        'r_number', 'r_image', 'd_license_number', 'd_license_image', 'phone', 'provider_id', 'nationality_id', 'status', 'activity_id',
        'fcm_token', 'logo', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        't_license_path', 'd_license_image_path', 'r_image_path', 'logo_path', 'image_path',
        'wh_from_thf', 'wh_to_thf'
    ];

    //atr
    public function getWhFromThfAttribute()
    {
        return date("g:i A", strtotime($this->wh_from));

    }// end of getWhFromAttribute

    public function getWhToThfAttribute()
    {
        return date("g:i A", strtotime($this->wh_to));

    }// end of getWhToAttribute

    public function getTLicensePathAttribute()
    {
        return Storage::url('uploads/' . $this->t_license);

    }// end of getTLicensePathAttribute

    public function getDLicenseImagePathAttribute()
    {
        return Storage::url('uploads/' . $this->d_license_image);

    }// end of getDLicenseImagePathAttribute

    public function getRImagePathAttribute()
    {
        return Storage::url('uploads/' . $this->r_image);

    }// end of getRImagePathAttribute

    public function getImagePathAttribute()
    {
        if ($this->image) {
            return Storage::url('uploads/' . $this->image);
        }

        return asset('assets/images/default.png');

    }// end of getImagePathAttribute

    public function getLogoPathAttribute()
    {
        if ($this->logo) {
            return Storage::url('uploads/' . $this->logo);
        }

        return asset('assets/images/default_logo.png');

    }// end of getLogoImageAttribute

    //scopes
    public function scopeWhenType($query, $type)
    {
        return $query->when($type, function ($q) use ($type) {

            return $q->where('type', $type);

        });

    }// end of scopeWhenType

    public function scopeWhenRoleId($query, $roleId)
    {
        return $query->when($roleId, function ($q) use ($roleId) {

            return $q->whereHas('roles', function ($qu) use ($roleId) {

                return $qu->where('id', $roleId);

            });

        });

    }// end of scopeWhenRoleId

    public function scopeWhenStatus($query, $status)
    {
        return $query->when($status, function ($q) use ($status) {

            return $q->where('status', $status);

        });

    }// end of scopeWhenStatus

    public function scopeWhenProviderId($query, $providerId)
    {
        return $query->when($providerId, function ($q) use ($providerId) {

            return $q->where('provider_id', $providerId);

        });

    }// end of scopeWhenProviderId

    public function scopeWhenNationalityId($query, $nationalityId)
    {
        return $query->when($nationalityId, function ($q) use ($nationalityId) {

            return $q->where('nationality_id', $nationalityId);

        });

    }// end of scopeWhenNationalityId

    //rel
    public function provider()
    {
        return $this->belongsTo(User::class, 'provider_id');

    }// end of provider

    public function nationality()
    {
        return $this->belongsTo(Nationality::class);

    }// end of nationality

    public function activity()
    {
        return $this->belongsTo(Activity::class);

    }// end of activity

    public function trucks()
    {
        return $this->hasMany(Truck::class, 'provider_id');

    }// end of trucks

    public function truckPrices()
    {
        return $this->hasMany(TruckPrice::class, 'provider_id');

    }// end of truckPrices

    public function routes()
    {
        return $this->belongsToMany(Route::class, 'provider_route')
            ->using('provider_route')
            ->with('truck_id', 'price');

    }// end of routes

    public function driverLocations()
    {
        return $this->hasMany(DriverLocation::class, 'driver_id');

    }// end of driverLocations

    public function shipments()
    {
        return $this->hasMany(Shipment::class);

    }// end of shipments

    public function trips()
    {
        return $this->hasMany(Trip::class);

    }// end of trips

    public function balances()
    {
        return $this->hasMany(Balance::class);

    }// end of balances

    protected static function booted()
    {
        static::creating(function ($user) {
            $user->api_token = Str::random(60);
        });

    }//end of booted

    //fun
    public function totalCreditBalance()
    {
        return (double)$this->balances()->where('type', 'credit')->sum('amount');

    }// end of creditBalance

    public function totalDebitBalance()
    {
        return (double)$this->balances()->where('type', 'debit')->sum('amount');

    }// end of creditBalance

}//end of model
