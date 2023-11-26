@extends('layouts.app')
  
@section('contents')
  <div class="dashboard-container" style="margin-left: 225px;">
    <h1>Welcome to the Admin Dashboard</h1>

    <div class="crud-section">
      <div class="crud-item">
        <h2>Manage Users</h2>
        <p>Perform CRUD operations on users.</p>
        <img src="admin_assets/img/images1.jpg" alt="User Image">
      </div>

      <div class="crud-item">
        <h2>Manage Songs</h2>
        <p>Perform CRUD operations on songs.</p>
        <img src="admin_assets/img/image2.jpg" alt="Song Image">
      </div>

      <!-- Add more CRUD items as needed -->

    </div>
  </div>

  <style>
    .dashboard-container {
      padding: 20px;
    }

    h1 {
      font-size: 24px;
      color: #333;
      margin-left: 34%;
    }

    .crud-section {
      display: flex;
      justify-content: space-around;
      margin-top: 20px;
    }

    .crud-item {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: center;
      border-radius: 8px;
      width: 200px;
    }

    img {
      max-width: 100%;
      height: auto;
      margin-top: 10px;
    }
  </style>
@endsection
