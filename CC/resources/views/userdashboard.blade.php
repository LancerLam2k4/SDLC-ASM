@extends('userlayouts.app')

@section('contents')
  <div class="dashboard-container" style="margin-left: 225px; display: flex; flex-direction: column; align-items: center;">
    <!-- User Avatar -->
    <div class="user-avatar" style="border-radius: 50%; overflow: hidden; margin-bottom: 20px;">
      <img src="admin_assets/img/2-p.jpg" alt="User Avatar" style="max-width: 500px;">
    </div>

    <!-- Notifications -->
    <ul class="notifications" style="list-style-type: none; padding: 0; text-align: center;">
      <li>You Can Listen To Music</li>
      <li>You Can Download Music</li>
      <li>You can take all actions related to Read permission</li>
      <li>You have the right to add new music</li>
      <!-- Add more notifications as needed -->
    </ul>
  </div>

  <style>
    .dashboard-container {
      padding: 20px;
    }

    .user-avatar img {
      width: 100%;
      height: auto;
    }

    .notifications {
      border: 1px #ddd;
      border-radius: 10px;
      padding: 10px;
    }

    .notifications li {
      margin-top: 10px;
    }
  </style>
@endsection
