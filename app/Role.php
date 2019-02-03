<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeAdmin($query)
    {
        return $query->where('name', 'admin');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeClient($query)
    {
        return $query->where('name', 'client');
    }
}
