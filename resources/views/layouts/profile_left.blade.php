<ul class="tabbable faq-tabbable">
    <li class="@php echo in_array(Request::segment(1),array('myprofile','myprofile-edit'))?'active':'' @endphp"><a href="{{ url('myprofile') }}">Basic Information</a></li>
    <li class="@php echo in_array(Request::segment(1),array('physical-info','physical-info-edit'))?'active':'' @endphp"><a href="{{ url('physical-info') }}">Physical Information</a></li>
    <li class="@php echo in_array(Request::segment(1),array('passport','passport-edit'))?'active':'' @endphp"><a href="{{ url('passport') }}">Passport</a></li>
    <li class="@php echo in_array(Request::segment(1),array('payments','payment-edit'))?'active':'' @endphp"><a href="{{ url('payments') }}">Payments</a></li>
    <li class="@php echo in_array(Request::segment(1),array('hajj','hajj-edit','hajj-create','hajj-detail'))?'active':'' @endphp"><a href="{{ url('hajj') }}">Hajj</a></li>
    @if(Auth::user()->is_group_leader=='হ্যাঁ')
    <li class="@php echo in_array(Request::segment(1),array('groups','group-create','group-edit'))?'active':'' @endphp"><a href="{{ url('groups') }}">Group</a></li>
    @endif

</ul>