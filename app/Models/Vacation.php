<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;

class Vacation extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dates = [
    	'start',
    	'finish',
    ];

    /**
     * Скоуп отпусков авторизованного пользователя
     * 
     * @return Builder
     */
    public function scopeMyVacations(Builder $query): Builder
    {
    	return $query->where('user_id', auth()->id());
    }

    /**
     * Скоуп отпуски других пользователей
     * 
     * @return Builder
     */
    public function scopeVacationsOtherUsers(Builder $query): Builder
    {
    	return $query->where('user_id', '<>', auth()->id());
    }

    /**
     * Скоуп: отпуски, которые были утверждены/нет руководителем
     * 
     * @param bool $fix = true
     * @return Builder
     */
    public function scopeFix(Builder $query, bool $fix = true): Builder
    {
    	return $query->where('fix', $fix);
    }

    /**
     * Пользователь, который запросил отпуск
     * 
     */
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
