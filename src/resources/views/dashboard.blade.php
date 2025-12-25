<x-app-layout>
    <div style="background-color: #f8fafc; min-height: 100vh; padding: 50px 20px; font-family: sans-serif;">
        <div style="max-width: 1000px; margin: 0 auto;">
            <h1 style="font-size: 32px; font-weight: 900; color: #0f172a; margin-bottom: 30px;">System Dashboard</h1>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                <div style="background: white; padding: 30px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); border-left: 5px solid #2563eb;">
                    <p style="color: #64748b; font-weight: bold; text-transform: uppercase; font-size: 12px; margin: 0;">Total Vehicles</p>
                    <h2 style="font-size: 48px; color: #1e293b; margin: 10px 0;">{{ $carCount }}</h2>
                    <a href="{{ route('cars.index') }}" style="color: #2563eb; text-decoration: none; font-size: 14px; font-weight: bold;">View Inventory →</a>
                </div>
                <div style="background: white; padding: 30px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); border-left: 5px solid #0f172a;">
                    <p style="color: #64748b; font-weight: bold; text-transform: uppercase; font-size: 12px; margin: 0;">Manufacturers</p>
                    <h2 style="font-size: 48px; color: #1e293b; margin: 10px 0;">{{ $manufacturerCount }}</h2>
                    <a href="{{ route('manufacturers.index') }}" style="color: #0f172a; text-decoration: none; font-size: 14px; font-weight: bold;">View Brands →</a>
                </div>
                <div style="background: white; padding: 30px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); border-left: 5px solid #10b981;">
                    <p style="color: #64748b; font-weight: bold; text-transform: uppercase; font-size: 12px; margin: 0;">Registered Users</p>
                    <h2 style="font-size: 48px; color: #1e293b; margin: 10px 0;">{{ $userCount }}</h2>
                    <p style="color: #10b981; margin: 0; font-size: 14px; font-weight: bold;">System Active</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>