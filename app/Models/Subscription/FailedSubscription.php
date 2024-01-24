<?php

namespace App\Models\Subscription;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FailedSubscription extends Model
{
    use HasFactory;
    protected $table= 'insufficient_balance_customers';
    protected $fillable = ['request_id',
    'transactionId',
    'timeStamp',
    'resultCode',
    'resultDesc',
    'failedReason',
    'amount',
    'referenceId',
    'accountNumber',
    'type',
    'remark',
    'planId',
    'product_id',
    'agent_id',
    'sale_request_time'
        ];
}
