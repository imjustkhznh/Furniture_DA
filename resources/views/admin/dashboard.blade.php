@extends('admin_layout')
@section('admin_content')
<style>
    .dashboard-container {
        padding: 40px 0;
    }

    .dashboard-title {
        margin-bottom: 10px;
        font-size: 28px;
        font-weight: 600;
        color: #1a202c;
    }

    .dashboard-subtitle {
        color: #718096;
        font-size: 14px;
        margin-bottom: 40px;
    }

    .stat-cards-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 50px;
    }

    .stat-card {
        background: #f7fafc;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 24px;
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        background: white;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .stat-label {
        font-size: 11px;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        color: #718096;
        font-weight: 600;
        margin-bottom: 12px;
    }

    .stat-value {
        font-size: 28px;
        font-weight: 700;
        color: #1a202c;
        margin-bottom: 8px;
    }

    .stat-change {
        font-size: 12px;
        color: #48bb78;
    }

    .chart-section {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 32px;
        margin-bottom: 30px;
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
    }

    .section-title {
        font-size: 18px;
        font-weight: 600;
        color: #1a202c;
    }

    .section-tabs {
        display: flex;
        gap: 20px;
    }

    .tab-button {
        background: none;
        border: none;
        font-size: 13px;
        color: #a0aec0;
        cursor: pointer;
        font-weight: 500;
        padding: 0;
        transition: color 0.3s ease;
    }

    .tab-button.active {
        color: #1a202c;
    }

    .best-sellers {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 32px;
        margin-bottom: 30px;
    }

    .product-item {
        display: flex;
        align-items: center;
        padding: 16px 0;
        border-bottom: 1px solid #edf2f7;
    }

    .product-item:last-child {
        border-bottom: none;
    }

    .product-image {
        width: 60px;
        height: 60px;
        background: #e2e8f0;
        border-radius: 6px;
        margin-right: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        object-fit: cover;
        overflow: hidden;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .product-info {
        flex: 1;
    }

    .product-name {
        font-size: 14px;
        font-weight: 500;
        color: #1a202c;
    }

    .product-meta {
        font-size: 12px;
        color: #a0aec0;
    }

    .view-all-link {
        display: inline-block;
        margin-top: 24px;
        padding: 10px 20px;
        background: #f7fafc;
        border: 1px solid #e2e8f0;
        border-radius: 4px;
        color: #1a202c;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .view-all-link:hover {
        background: white;
        border-color: #cbd5e0;
    }

    .recent-orders {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 32px;
    }

    .orders-table {
        width: 100%;
        border-collapse: collapse;
    }

    .orders-table th {
        background: #f7fafc;
        padding: 12px 16px;
        text-align: left;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        color: #718096;
        border-bottom: 1px solid #e2e8f0;
    }

    .orders-table td {
        padding: 16px;
        border-bottom: 1px solid #edf2f7;
        font-size: 13px;
        color: #1a202c;
    }

    .orders-table tr:last-child td {
        border-bottom: none;
    }

    .status-badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
    }

    .status-delivered {
        background: #c6f6d5;
        color: #22543d;
    }

    .status-shipped {
        background: #bee3f8;
        color: #2c5282;
    }

    .status-pending {
        background: #fed7d7;
        color: #742a2a;
    }

    .two-column {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
    }

    @media (max-width: 1024px) {
        .two-column {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="content">
    <div class="container-fluid dashboard-container">

        <!-- Header -->
        <div style="margin-bottom: 40px;">
            <h1 class="dashboard-title">Tổng Quan</h1>
            <p class="dashboard-subtitle">Thống kê và theo dõi hiệu suất bán hàng toàn cầu.</p>
        </div>

        <!-- Stat Cards -->
        <div class="stat-cards-grid">
            <div class="stat-card">
                <div class="stat-label">Tổng Tiền</div>
                <div class="stat-value">₫<span data-plugin="counterup">{{$TOTAL}}</span></div>
                <div class="stat-change">↑ 12.5% so với tháng trước</div>
            </div>

            <div class="stat-card">
                <div class="stat-label">Tổng Đơn</div>
                <div class="stat-value"><span data-plugin="counterup">{{$Count_ORD + $Count_ORDAC + $Count_ORDDE}}</span></div>
                <div class="stat-change">↓ 8% so với tháng trước</div>
            </div>

            <div class="stat-card">
                <div class="stat-label">Tổng Sản Phẩm</div>
                <div class="stat-value"><span data-plugin="counterup">{{$Count_PRD}}</span></div>
                <div class="stat-change">↑ 24% Hoạt động trong danh mục</div>
            </div>

            <div class="stat-card">
                <div class="stat-label">Tổng Khách</div>
                <div class="stat-value"><span data-plugin="counterup">{{$Count_CUS}}</span></div>
                <div class="stat-change">↑ 38% Tăng trưởng</div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="two-column">
            <!-- Best Sellers -->
            <div class="best-sellers">
                <div class="section-header">
                    <h2 class="section-title">Sản Phẩm Bán Chạy</h2>
                </div>
                
                @if($BestSellers && count($BestSellers) > 0)
                    @foreach($BestSellers as $product)
                    <div class="product-item">
                        <div class="product-image">
                            @if($product->ProductImage1)
                                <img src="{{ asset('storage/products/' . $product->ProductImage1) }}" alt="{{ $product->ProductName }}" onerror="this.parentElement.innerHTML='<img src=&quot;data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 100 100%27%3E%3Crect fill=%27%23e2e8f0%27 width=%27100%27 height=%27100%27/%3E%3Ctext x=%2750%27 y=%2750%27 dominant-baseline=%27middle%27 text-anchor=%27middle%27 font-family=%27sans-serif%27 font-size=%2714%27 fill=%27%23a0aec0%27%3E📦%3C/text%3E%3C/svg%3E&quot; alt=&quot;No image&quot; />'" />
                            @else
                                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Crect fill='%23e2e8f0' width='100' height='100'/%3E%3Ctext x='50' y='50' dominant-baseline='middle' text-anchor='middle' font-family='sans-serif' font-size='14' fill='%23a0aec0'%3E📦%3C/text%3E%3C/svg%3E" alt="No image" />
                            @endif
                        </div>
                        <div class="product-info">
                            <div class="product-name">{{ $product->ProductName }}</div>
                            <div class="product-meta">{{ $product->TotalSold }} Đã bán | ₫{{ number_format($product->ProductPrice) }}</div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="product-item">
                        <p style="color: #a0aec0; margin: 20px 0;">Chưa có sản phẩm bán chạy</p>
                    </div>
                @endif

                <a href="/view-product" class="view-all-link">XEM TẤT CẢ SẢN PHẨM</a>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="recent-orders">
            <div class="section-header">
                <h2 class="section-title">Đơn Hàng Gần Đây</h2>
                <a href="#" style="font-size: 12px; color: #667eea; text-decoration: none; font-weight: 600;">TOÀN BỘ</a>
            </div>

            <table class="orders-table">
                <thead>
                    <tr>
                        <th>Mã Đơn</th>
                        <th>Khách Hàng</th>
                        <th>Ngày</th>
                        <th>Tổng Tiền</th>
                        <th>Trạng Thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if($RecentOrders && count($RecentOrders) > 0)
                        @foreach($RecentOrders as $order)
                        <tr>
                            <td>#ĐH-{{ $order->OrderID }}</td>
                            <td>{{ $order->CustomerName }}</td>
                            <td>{{ date('M d, Y', strtotime($order->OrderDate)) }}</td>
                            <td>₫{{ number_format($order->OrderTotal) }}</td>
                            <td>
                                @if($order->OrderStatus == 0)
                                    <span class="status-badge status-pending">Chờ xử lí</span>
                                @elseif($order->OrderStatus == 1)
                                    <span class="status-badge status-shipped">Đã duyệt</span>
                                @else
                                    <span class="status-badge status-delivered">Đã giao</span>
                                @endif
                            </td>
                            <td>⋮</td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" style="text-align: center; color: #a0aec0; padding: 20px;">Chưa có đơn hàng</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </div>
</div>


@endsection
