<div style="background-color: #f8fafc; min-height: 100vh; display: flex; justify-content: center; align-items: center; font-family: sans-serif;">
    <div style="background: white; width: 450px; padding: 40px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
        <h2 style="text-align: center; color: #1e293b; margin-bottom: 30px; font-weight: 800;">Create Profile</h2>
        
        <form action="{{ url('/register') }}" method="POST">
            @csrf
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Full Name</label>
                <input type="text" name="name" required style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 10px; outline: none;">
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Email Address</label>
                <input type="email" name="email" required style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 10px; outline: none;">
            </div>
            
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Password</label>
                <input type="password" name="password" required style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 10px; outline: none;">
            </div>

            <div style="margin-bottom: 25px;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Confirm Password</label>
                <input type="password" name="password_confirmation" required style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 10px; outline: none;">
            </div>

            <button type="submit" style="width: 100%; background: #2563eb; color: white; padding: 14px; border: none; border-radius: 10px; font-weight: bold; cursor: pointer; margin-bottom: 15px;">
                Create Account
            </button>

            <p style="text-align: center; font-size: 14px; color: #64748b;">
                Already have an account? <a href="{{ route('login') }}" style="color: #2563eb; text-decoration: none; font-weight: bold;">Login</a>
            </p>
        </form>
    </div>
</div>