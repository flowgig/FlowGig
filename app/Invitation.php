<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

class Invitation extends Model
{
    public const PENDING = 'pending';
    public const ACCEPTED = 'accepted';
    public const DECLINED = 'declined';
    public const EXPIRED = 'expired';

    public static $validStatuses = [
        self::PENDING, self::ACCEPTED, self::DECLINED, self::EXPIRED
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['status_set_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'invitee_id', 'invitee_email', 'message'
    ];

    /**
     * When setting a (valid) status, set status_set_at to now.
     *
     * @param $status
     * @throws InvalidArgumentException
     */
    public function setStatusAttribute($status)
    {
        if (!self::statusIsValid($status))
            throw new InvalidArgumentException($status . " is not a valid invitation status.");

        $this->attributes['status'] = $status;
        $this->status_set_at = Carbon::now();
    }

    /**
     * Get who made the invitation
     */
    public function creator()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    /**
     * Get who updated the invitation
     */
    public function updater()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }

    /**
     * Get the invited user.
     */
    public function invitee()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the owning invitational model.
     */
    public function invitational()
    {
        return $this->morphTo();
    }

    /**
     * Return the name, of the invited person, if any. Otherwise the the email-address.
     *
     * @return string
     */
    public function inviteeName()
    {
        return $this->invitee->name ?? $this->invitee_email;
    }

    /**
     * Check whether the invitation has the status of pending
     *
     * @return bool
     */
    public function isPending()
    {
        return $this->status == self::PENDING;
    }

    /**
     * Check whether the invitation is for the given (invitational) type.
     *
     * @param $invitationalType
     * @return bool
     */
    public function isFor($invitationalType)
    {
        return $this->invitational_type == $invitationalType;
    }

    /**
     * Scope a query to only include given invitational types.
     *
     * @param $query
     * @param $invitationalTypes
     * @return mixed
     */
    public function scopeFor($query, $invitationalTypes)
    {
        return $query->whereIn('invitational_type', $invitationalTypes);
    }

    /**
     * Check whether the given status is valid.
     *
     * @param $status
     * @return bool
     */
    public static function statusIsValid($status)
    {
        return in_array($status, self::$validStatuses);
    }
}
