<div class="container mt-4">
    <h2>Đơn hàng đã duyệt</h2>
    <table id="datatablesSimple" class="table">
        <thead>
            <tr>
                <th scope="col">Order ID</th>
                <th scope="col">User ID</th>
                <th scope="col">Address</th>
                <th scope="col">Shipping Method</th>
                <th scope="col">Total Price</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody id="orderTableBody">
            <tr>
                <td>1</td>
                <td>101</td>
                <td>123 Main St, City</td>
                <td>Express</td>
                <td>$200</td>
                <td>
                    <a href="./?page=order-detail">
                        <button type="button" class="btn btn-primary btn-sm">Xem chi tiết</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>102</td>
                <td>456 Elm St, Town</td>
                <td>Standard</td>
                <td>$150</td>
                <td>
                    <a href="./?page=order-detail">
                        <button type="button" class="btn btn-primary btn-sm">Xem chi tiết</button>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>