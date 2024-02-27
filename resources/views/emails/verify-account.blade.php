<body>
    <h3>Xin chào {{ $account->name }}</h3>
    <h7>Vui lòng bấm vào liên kết bên dưới để xác nhận địa chỉ email của bạn:</h7>
    </br>
    <a href="{{route('account.veryfy', $account-> email )}}"
        style="display: inline-block; background-color: #007bff; color: #ffffff; text-decoration: none; padding: 10px 20px; border-radius: 5px;">Xác
        nhận Email</a>
    </br>
    <h7>Nếu bạn không thực hiện yêu cầu này, vui lòng bỏ qua email này. Tài khoản của bạn sẽ vẫn được tạo, nhưng một số
        tính năng có thể bị hạn chế.</h7>
    <h7>Nếu bạn gặh7 bất kỳ vấn đề nào hoặc có câu hỏi, đừng ngần ngại liên hệ với chúng tôi qua địa chỉ email này.</h7>
    </br>
    <h7>Xin cảm ơn,</h7>
    <h7>Quốc An</h7>
</body>