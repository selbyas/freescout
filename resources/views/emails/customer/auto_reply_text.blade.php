{{ (new Html2Text\Html2Text($auto_reply_message))->getText() }}
@if (\App\Option::get('email_branding'))

-----------------------------------------------------------
{!! __('Support powered by :app_name — Unified helpdesk and customer portal', ['app_name' => \Config::get('app.name')]) !!}
@endif
