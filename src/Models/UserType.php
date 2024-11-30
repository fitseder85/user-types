<?php

namespace Fitseder85\UserTypes\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserType extends Model
{
    use HasFactory;
    protected $fillable = [ 'user_id', 'name', 'description', 'status' ];

    public function users() {
        return $this->hasMany(User::class);
    }

    public function scopeLatestFirst($query) {
        $query->orderBy('created_at', 'DESC');

        return $query;
    }
    public function scopeFilter($query) {
        if ($search = request('search')) {
            $query->where('name', 'like', "%{$search}%");
            $query->orWhere('description', 'like', "%{$search}%");
        }

        return $query;
    }
    public function scopeActive($query) {
        $query->where('status', 1);

        return $query;
    }
}
