<div class="page_header">
  <h1>
    <a href="{{ action('DashboardController@index') }}"><i class="fa fa-home"></i></a> <i class="fa fa-angle-right"></i>
    @if (isset($tab) && ($tab <> 'home'))
      <a href="{{ action('GroupController@show', $group->id) }}">{{ $group->name }}</a>
    @else
      {{ $group->name }}
    @endif
  </h1>
</div>

<ul class="nav nav-tabs">
  <li role="presentation" @if (isset($tab) && ($tab == 'home')) class="active" @endif>
    <a href="{{ action('GroupController@show', $group->id) }}">
      <i class="fa fa-home"></i> <span class="hidden-xs hidden-sm">{{ trans('messages.group_home') }}</span>
    </a>
  </li>

  <li role="presentation" @if (isset($tab) && ($tab == 'discussion')) class="active" @endif>
    <a href="{{ action('DiscussionController@index', $group->id) }}">
      <i class="fa fa-comments"></i> <span class="hidden-xs hidden-sm">{{ trans('messages.discussions') }}</span>
    </a>
  </li>

  <li role="presentation" @if (isset($tab) && ($tab == 'action')) class="active" @endif>
    <a href="{{ action('ActionController@index', $group->id) }}">
      <i class="fa fa-calendar"></i> <span class="hidden-xs hidden-sm">{{ trans('messages.actions') }}</span>
    </a>
  </li>

  <li role="presentation" @if (isset($tab) && ($tab == 'files')) class="active" @endif>
    <a href="{{ action('FileController@index', $group->id) }}">
      <i class="fa fa-file-o"></i> <span class="hidden-xs hidden-sm">{{ trans('messages.files') }}</span>
    </a>
  </li>

  <li role="presentation" @if (isset($tab) && ($tab == 'users')) class="active" @endif>
    <a href="{{ action('UserController@index', $group->id) }}">
      <i class="fa fa-users"></i> <span class="hidden-xs hidden-sm">{{ trans('messages.members') }}</span>
    </a>
  </li>

  @if ($group->isMember())
    <li role="presentation" @if (isset($tab) && ($tab == 'settings')) class="active" @endif>
      <a href="{{ action('MembershipController@settingsForm', $group->id) }}">
        <i class="fa fa-cog"></i> <span class="hidden-xs hidden-sm">{{ trans('messages.settings') }}</span>
      </a>
    </li>
  @else
    <li role="presentation" @if (isset($tab) && ($tab == 'settings')) class="active" @endif>
      <a href="{{ action('MembershipController@joinForm', $group->id) }}">
        <i class="fa fa-cog"></i> <span class="hidden-xs hidden-sm">{{ trans('messages.join') }}</span>
      </a>
    </li>
  @endif

</ul>
