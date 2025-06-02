<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pearl & Prestige Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Montserrat:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --luxury-gold: #9a3412;
            --luxury-black: #1a1a1a;
            --luxury-grey: #f8f8f8;
            --luxury-dark-grey: #666666;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, #f9f9f9 0%, #f0f0f0 100%);
            min-height: 100vh;
            line-height: 1.6;
        }

        .font-serif {
            font-family: 'Cormorant Garamond', serif;
        }

        .font-sans {
            font-family: 'Montserrat', sans-serif;
        }

        /* Header */
        .admin-header {
            background: rgba(255, 255, 255, 0.9);
            border-bottom: 1px solid #e5e5e5;
            padding: 16px 24px;
            margin-bottom: 32px;
            position: sticky;
            top: 0;
            z-index: 50;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand-section {
            display: flex;
            align-items: center;
            gap: 32px;
        }

        .brand-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2rem;
            font-weight: 300;
            color: #1a1a1a;
        }

        .brand-separator {
            color: #ccc;
        }

        .admin-label {
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #666;
            font-weight: 500;
        }

        .header-buttons {
            display: flex;
            gap: 16px;
        }

        .nav-button {
            background: transparent;
            border: 1px solid rgba(154, 52, 18, 0.3);
            color: #666;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 0.875rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
        }

        .nav-button:hover {
            border-color: var(--luxury-gold);
            color: var(--luxury-gold);
            transform: translateY(-2px);
        }

        /* Main Content */
        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px 32px;
        }

        /* Welcome Section */
        .welcome-section {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(248, 248, 248, 0.9) 100%);
            border-radius: 16px;
            padding: 40px;
            margin-bottom: 48px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .welcome-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 3rem;
            font-weight: 300;
            color: #1a1a1a;
            margin-bottom: 16px;
        }

        .welcome-title .highlight {
            color: var(--luxury-gold);
        }

        .welcome-text {
            color: #666;
            font-size: 1.125rem;
            max-width: 600px;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
            margin-bottom: 48px;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .stat-content {
            display: flex;
            align-items: center;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 16px;
        }

        .stat-info h3 {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #666;
            font-weight: 500;
            margin-bottom: 4px;
        }

        .stat-info p {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2rem;
            font-weight: 300;
            color: #1a1a1a;
        }

        .stat-revenue {
            color: var(--luxury-gold) !important;
        }

        /* Content Grid */
        .content-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 32px;
            margin-bottom: 48px;
        }

        @media (max-width: 768px) {
            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        .admin-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.5);
            overflow: hidden;
        }

        .admin-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            padding: 24px 32px 16px;
            border-bottom: 1px solid #f0f0f0;
        }

        .card-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.5rem;
            font-weight: 300;
            color: #1a1a1a;
            position: relative;
            display: inline-block;
            padding-bottom: 8px;
        }

        .card-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 2px;
            background: var(--luxury-gold);
        }

        .card-body {
            padding: 24px;
        }

        .order-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px;
            border-radius: 8px;
            transition: all 0.3s ease;
            margin-bottom: 12px;
        }

        .order-item:hover {
            background: rgba(154, 52, 18, 0.05);
            transform: translateX(5px);
        }

        .order-info h4 {
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 4px;
        }

        .order-info p {
            font-size: 0.875rem;
            color: #666;
        }

        .order-details {
            text-align: right;
        }

        .order-amount {
            font-weight: 600;
            color: var(--luxury-gold);
            margin-bottom: 4px;
        }

        .order-date {
            font-size: 0.75rem;
            color: #666;
        }

        /* Stock Alerts */
        .stock-badge {
            display: inline-flex;
            align-items: center;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .stock-critical {
            background: #fee2e2;
            color: #dc2626;
            animation: pulse 2s infinite;
        }

        .stock-low {
            background: #fef3c7;
            color: #d97706;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        /* Quick Actions */
        .actions-section h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2rem;
            font-weight: 300;
            color: #1a1a1a;
            margin-bottom: 32px;
            position: relative;
            display: inline-block;
            padding-bottom: 8px;
        }

        .actions-section h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 2px;
            background: var(--luxury-gold);
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 24px;
        }

        .action-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 16px;
            padding: 32px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.5);
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .action-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            background: white;
        }

        .action-icon {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            transition: all 0.3s ease;
        }

        .action-card:hover .action-icon {
            transform: scale(1.1);
        }

        .action-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.25rem;
            font-weight: 500;
            color: #1a1a1a;
            margin-bottom: 8px;
        }

        .action-description {
            font-size: 0.875rem;
            color: #666;
        }

        /* Modal Styles */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .modal-container {
            width: 90%;
            max-width: 800px;
            max-height: 80vh;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            transform: scale(0.8);
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .modal-overlay.active .modal-container {
            transform: scale(1);
        }

        .modal-header {
            padding: 30px 40px 20px;
            border-bottom: 1px solid #f0f0f0;
            background: linear-gradient(135deg, #fff 0%, #f8f8f8 100%);
            position: relative;
        }

        .modal-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--luxury-gold) 0%, rgba(154, 52, 18, 0.5) 100%);
        }

        .modal-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.5rem;
            font-weight: 300;
            color: #1a1a1a;
            margin: 0;
            position: relative;
            display: inline-block;
            padding-bottom: 8px;
        }

        .modal-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 2px;
            background: var(--luxury-gold);
        }

        .modal-close {
            position: absolute;
            top: 30px;
            right: 40px;
            background: transparent;
            border: none;
            font-size: 24px;
            color: #666;
            cursor: pointer;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .modal-close:hover {
            background: rgba(154, 52, 18, 0.1);
            color: var(--luxury-gold);
            transform: rotate(90deg);
        }

        .modal-body {
            padding: 30px 40px 40px;
            max-height: 60vh;
            overflow-y: auto;
        }

        .modal-order-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            margin-bottom: 15px;
            background: #f9f9f9;
            border-radius: 12px;
            transition: all 0.3s ease;
            border: 1px solid #f0f0f0;
        }

        .modal-order-item:hover {
            background: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            border-color: rgba(154, 52, 18, 0.2);
        }

        .modal-order-info h4 {
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 4px;
        }

        .modal-order-info .customer {
            font-size: 0.875rem;
            color: #666;
            margin-bottom: 8px;
        }

        .modal-order-meta {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .status-completed {
            background: #d1fae5;
            color: #059669;
        }

        .status-processing {
            background: #fef3c7;
            color: #d97706;
        }

        .status-pending {
            background: #dbeafe;
            color: #2563eb;
        }

        .status-cancelled {
            background: #fee2e2;
            color: #dc2626;
        }

        .modal-order-date {
            font-size: 0.75rem;
            color: #666;
        }

        .modal-order-amount {
            text-align: right;
        }

        .modal-order-amount .amount {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--luxury-gold);
            margin-bottom: 4px;
        }

        .modal-order-amount .items {
            font-size: 0.875rem;
            color: #666;
        }

        /* Products Modal Styles */
        .add-product-btn {
            background: var(--luxury-gold);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            font-size: 0.875rem;
        }

        .add-product-btn:hover {
            background: rgba(154, 52, 18, 0.8);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(154, 52, 18, 0.3);
        }

        .modal-product-item {
            display: flex;
            align-items: center;
            padding: 20px;
            margin-bottom: 15px;
            background: #f9f9f9;
            border-radius: 12px;
            transition: all 0.3s ease;
            border: 1px solid #f0f0f0;
            gap: 20px;
        }

        .modal-product-item:hover {
            background: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            border-color: rgba(154, 52, 18, 0.2);
        }

        .product-image {
            flex-shrink: 0;
        }

        .product-placeholder {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product-info {
            flex-grow: 1;
        }

        .product-info h4 {
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 4px;
            font-size: 1.1rem;
        }

        .product-sku {
            font-size: 0.875rem;
            color: #666;
            margin-bottom: 8px;
        }

        .product-meta {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .product-price {
            font-weight: 700;
            color: var(--luxury-gold);
            font-size: 1.1rem;
        }

        .product-actions {
            display: flex;
            gap: 8px;
            flex-shrink: 0;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 1px solid;
        }

        .edit-btn {
            background: #eff6ff;
            color: #2563eb;
            border-color: #2563eb;
        }

        .edit-btn:hover {
            background: #2563eb;
            color: white;
            transform: translateY(-1px);
        }

        .delete-btn {
            background: #fee2e2;
            color: #dc2626;
            border-color: #dc2626;
        }

        .delete-btn:hover {
            background: #dc2626;
            color: white;
            transform: translateY(-1px);
        }

        /* Color classes for icons */
        .bg-blue-50 {
            background: #eff6ff;
        }

        .text-blue-600 {
            color: #2563eb;
        }

        .bg-green-50 {
            background: #f0fdf4;
        }

        .text-green-600 {
            color: #16a34a;
        }

        .bg-purple-50 {
            background: #faf5ff;
        }

        .text-purple-600 {
            color: #9333ea;
        }

        .bg-yellow-50 {
            background: #fffbeb;
        }

        .text-yellow-600 {
            color: #d97706;
        }
    </style>
</head>

<body>
    <!-- Admin Header -->
    <div class="admin-header">
        <div class="header-content">
            <div class="brand-section">
                <h1 class="brand-title">Pearl & Prestige</h1>
                <span class="brand-separator">|</span>
                <span class="admin-label">Admin Dashboard</span>
            </div>
            <div class="header-buttons">
                <a href="{{ route('home') }}" class="px-4 py-2 ">
                    <button class="nav-button">
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Back to Site
                    </button> </a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="nav-button px-4 py-2 rounded-lg font-sans text-sm">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m10 0v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h8a3 3 0 013 3v1"></path>
                        </svg>
                        Logout
                    </button>
                </form>

            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Welcome Section -->
        <div class="welcome-section">
            <h2 class="welcome-title">
                Welcome Back, <span class="highlight">Admin</span>
            </h2>
            <p class="welcome-text">
                Here's what's happening with your luxury store today. You have <strong>5</strong> orders to process and <strong>3</strong> stock alerts.
            </p>
        </div>

        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-content">
                    <div class="stat-icon bg-blue-50">
                        <svg width="24" height="24" class="text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <div class="stat-info">
                        <h3>Total Products</h3>
                        <p>147</p>
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-content">
                    <div class="stat-icon bg-green-50">
                        <svg width="24" height="24" class="text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <div class="stat-info">
                        <h3>Total Orders</h3>
                        <p>342</p>
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-content">
                    <div class="stat-icon bg-purple-50">
                        <svg width="24" height="24" class="text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                    <div class="stat-info">
                        <h3>Total Users</h3>
                        <p>1,247</p>
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-content">
                    <div class="stat-icon bg-yellow-50">
                        <svg width="24" height="24" class="text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                    <div class="stat-info">
                        <h3>Total Revenue</h3>
                        <p class="stat-revenue">$127,450.00</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Grid -->
        <div class="content-grid">
            <!-- Recent Orders -->
            <div class="admin-card">
                <div class="card-header">
                    <h3 class="card-title">Recent Orders</h3>
                </div>
                <div class="card-body">
                    <div class="order-item">
                        <div class="order-info">
                            <h4>#ORD-2024-001</h4>
                            <p>Sarah Johnson</p>
                        </div>
                        <div class="order-details">
                            <p class="order-amount">$2,450.00</p>
                            <p class="order-date">May 30, 2025</p>
                        </div>
                    </div>
                    <div class="order-item">
                        <div class="order-info">
                            <h4>#ORD-2024-002</h4>
                            <p>Michael Chen</p>
                        </div>
                        <div class="order-details">
                            <p class="order-amount">$1,875.00</p>
                            <p class="order-date">May 29, 2025</p>
                        </div>
                    </div>
                    <div class="order-item">
                        <div class="order-info">
                            <h4>#ORD-2024-003</h4>
                            <p>Emma Rodriguez</p>
                        </div>
                        <div class="order-details">
                            <p class="order-amount">$3,200.00</p>
                            <p class="order-date">May 29, 2025</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stock Alerts -->
            <div class="admin-card">
                <div class="card-header">
                    <h3 class="card-title">Stock Alerts</h3>
                </div>
                <div class="card-body">
                    <div class="order-item">
                        <div class="order-info">
                            <h4>Diamond Tennis Bracelet</h4>
                            <p>SKU-DTB-001</p>
                        </div>
                        <div class="order-details">
                            <span class="stock-badge stock-critical">2 left</span>
                        </div>
                    </div>
                    <div class="order-item">
                        <div class="order-info">
                            <h4>Gold Pearl Necklace</h4>
                            <p>SKU-GPN-003</p>
                        </div>
                        <div class="order-details">
                            <span class="stock-badge stock-low">5 left</span>
                        </div>
                    </div>
                    <div class="order-item">
                        <div class="order-info">
                            <h4>Platinum Ring Set</h4>
                            <p>SKU-PRS-007</p>
                        </div>
                        <div class="order-details">
                            <span class="stock-badge stock-critical">1 left</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="actions-section">
            <h3>Quick Actions</h3>
            <div class="actions-grid">
                <a href="{{ route('admin.products') }}" class="action-card">
                    <div class="action-icon bg-blue-50">
                        <svg width="32" height="32" class="text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h4 class="action-title">Manage Products</h4>
                    <p class="action-description">Add, edit, or remove luxury items from your collection</p>
                </a>

                <div class="action-card" onclick="openOrdersModal()">
                    <div class="action-icon bg-green-50">
                        <svg width="32" height="32" class="text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h4 class="action-title">Process Orders</h4>
                    <p class="action-description">Review and fulfill customer orders efficiently</p>
                </div>

                <div class="action-card">
                    <div class="action-icon bg-purple-50">
                        <svg width="32" height="32" class="text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                    <h4 class="action-title">Manage Users</h4>
                    <p class="action-description">View and manage your valuable customers</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Orders Modal -->
    <div id="ordersModal" class="modal-overlay">
        <div class="modal-container">
            <div class="modal-header">
                <h2 class="modal-title">Recent Orders</h2>
                <button class="modal-close" onclick="closeOrdersModal()">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-order-item">
                    <div class="modal-order-info">
                        <h4>#ORD-2024-001</h4>
                        <p class="customer">Customer: Sarah Johnson</p>
                        <div class="modal-order-meta">
                            <span class="status-badge status-completed">Completed</span>
                            <span class="modal-order-date">May 30, 2025</span>
                        </div>
                    </div>
                    <div class="modal-order-amount">
                        <p class="amount">$2,450.00</p>
                        <p class="items">3 items</p>
                    </div>
                </div>

                <div class="modal-order-item">
                    <div class="modal-order-info">
                        <h4>#ORD-2024-002</h4>
                        <p class="customer">Customer: Michael Chen</p>
                        <div class="modal-order-meta">
                            <span class="status-badge status-processing">Processing</span>
                            <span class="modal-order-date">May 29, 2025</span>
                        </div>
                    </div>
                    <div class="modal-order-amount">
                        <p class="amount">$1,875.00</p>
                        <p class="items">2 items</p>
                    </div>
                </div>

                <div class="modal-order-item">
                    <div class="modal-order-info">
                        <h4>#ORD-2024-003</h4>
                        <p class="customer">Customer: Emma Rodriguez</p>
                        <div class="modal-order-meta">
                            <span class="status-badge status-pending">Pending</span>
                            <span class="modal-order-date">May 29, 2025</span>
                        </div>
                    </div>
                    <div class="modal-order-amount">
                        <p class="amount">$3,200.00</p>
                        <p class="items">1 item</p>
                    </div>
                </div>

                <div class="modal-order-item">
                    <div class="modal-order-info">
                        <h4>#ORD-2024-004</h4>
                        <p class="customer">Customer: David Wilson</p>
                        <div class="modal-order-meta">
                            <span class="status-badge status-completed">Completed</span>
                            <span class="modal-order-date">May 28, 2025</span>
                        </div>
                    </div>
                    <div class="modal-order-amount">
                        <p class="amount">$5,750.00</p>
                        <p class="items">4 items</p>
                    </div>
                </div>

                <div class="modal-order-item">
                    <div class="modal-order-info">
                        <h4>#ORD-2024-005</h4>
                        <p class="customer">Customer: Lisa Thompson</p>
                        <div class="modal-order-meta">
                            <span class="status-badge status-cancelled">Cancelled</span>
                            <span class="modal-order-date">May 28, 2025</span>
                        </div>
                    </div>
                    <div class="modal-order-amount">
                        <p class="amount" style="color: #999;">$890.00</p>
                        <p class="items">1 item</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Modal -->
    <div id="productsModal" class="modal-overlay">
        <div class="modal-container">
            <div class="modal-header">
                <h2 class="modal-title">Manage Products</h2>
                <button class="modal-close" onclick="closeProductsModal()">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-order-item">
                    <div class="modal-order-info">
                        <h4>Diamond Tennis Bracelet</h4>
                        <p class="customer">SKU: DTB-001</p>
                        <div class="modal-order-meta">
                            <span class="status-badge" style="background: #fee2e2; color: #dc2626;">2 in stock</span>
                            <span class="modal-order-date">$2,450.00</span>
                        </div>
                    </div>
                    <div class="modal-order-amount">
                        <p class="amount">Active</p>
                        <p class="items">Luxury</p>
                    </div>
                </div>

                <div class="modal-order-item">
                    <div class="modal-order-info">
                        <h4>Gold Pearl Necklace</h4>
                        <p class="customer">SKU: GPN-003</p>
                        <div class="modal-order-meta">
                            <span class="status-badge" style="background: #fef3c7; color: #d97706;">5 in stock</span>
                            <span class="modal-order-date">$1,875.00</span>
                        </div>
                    </div>
                    <div class="modal-order-amount">
                        <p class="amount">Active</p>
                        <p class="items">Luxury</p>
                    </div>
                </div>

                <div class="modal-order-item">
                    <div class="modal-order-info">
                        <h4>Platinum Ring Set</h4>
                        <p class="customer">SKU: PRS-007</p>
                        <div class="modal-order-meta">
                            <span class="status-badge" style="background: #fee2e2; color: #dc2626;">1 in stock</span>
                            <span class="modal-order-date">$3,200.00</span>
                        </div>
                    </div>
                    <div class="modal-order-amount">
                        <p class="amount">Active</p>
                        <p class="items">Luxury</p>
                    </div>
                </div>

                <div class="modal-order-item">
                    <div class="modal-order-info">
                        <h4>Emerald Earrings</h4>
                        <p class="customer">SKU: EE-012</p>
                        <div class="modal-order-meta">
                            <span class="status-badge" style="background: #d1fae5; color: #059669;">12 in stock</span>
                            <span class="modal-order-date">$4,750.00</span>
                        </div>
                    </div>
                    <div class="modal-order-amount">
                        <p class="amount">Active</p>
                        <p class="items">Luxury</p>
                    </div>
                </div>

                <div class="modal-order-item">
                    <div class="modal-order-info">
                        <h4>Silver Pendant</h4>
                        <p class="customer">SKU: SP-024</p>
                        <div class="modal-order-meta">
                            <span class="status-badge" style="background: #d1fae5; color: #059669;">8 in stock</span>
                            <span class="modal-order-date">$890.00</span>
                        </div>
                    </div>
                    <div class="modal-order-amount">
                        <p class="amount">Active</p>
                        <p class="items">Premium</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openOrdersModal() {
            const modal = document.getElementById('ordersModal');
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeOrdersModal() {
            const modal = document.getElementById('ordersModal');
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        function openProductsModal() {
            const modal = document.getElementById('productsModal');
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeProductsModal() {
            const modal = document.getElementById('productsModal');
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        document.getElementById('ordersModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeOrdersModal();
            }
        });

        document.getElementById('productsModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeProductsModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeOrdersModal();
                closeProductsModal();
            }
        });

        // Product action handlers (demo functionality)
        document.addEventListener('click', function(e) {
            if (e.target.closest('.edit-btn')) {
                alert('Edit product functionality would open here!');
            }
            if (e.target.closest('.delete-btn')) {
                if (confirm('Are you sure you want to delete this product?')) {
                    alert('Product deleted successfully!');
                    // Here you would normally remove the product from the list
                }
            }
            if (e.target.closest('.add-product-btn')) {
                alert('Add new product form would open here!');
            }
        });
    </script>
</body>

</html>