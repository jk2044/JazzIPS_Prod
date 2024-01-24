<?php

namespace App\Models\Subscription;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerSubscription extends Model
{
    use HasFactory;
    protected $table= 'customer_subscriptions';
    protected $fillable = ['subscription_id',
    'customer_id',
    'payer_cnic',
    'payer_msisdn',
    'subscriber_cnic',
    'subscriber_msisdn',
    'beneficiary_name',
    'beneficiary_msisdn',
    'transaction_amount',
    'transaction_status',
    'referenceId',
    'cps_transaction_id',
    'cps_response_text',
    'product_duration',
    'plan_id',
    'productId',
    'policy_status',
    'pulse',
    'api_source',
    'recursive_charging_date',
    'subscription_time',
    'grace_period_time',
    'sales_agent'];
}
