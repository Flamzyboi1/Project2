import './bootstrap';
import '../css/app.css';
import { createRoot } from 'react-dom/client';
import React, { useState, useEffect } from 'react';

// 1. MODAL COMPONENT (The Popup)
const CarModal = ({ car, onClose }) => {
    if (!car) return null;
    return (
        <div style={{
            position: 'fixed', top: 0, left: 0, width: '100%', height: '100%',
            backgroundColor: 'rgba(0,0,0,0.9)', display: 'flex', justifyContent: 'center',
            alignItems: 'center', zIndex: 9999, padding: '20px'
        }} onClick={onClose}>
            <div style={{
                backgroundColor: 'white', maxWidth: '800px', width: '100%', borderRadius: '12px',
                overflow: 'hidden', position: 'relative', boxShadow: '0 25px 50px rgba(0,0,0,0.5)'
            }} onClick={e => e.stopPropagation()}>
                <button onClick={onClose} style={{
                    position: 'absolute', top: '15px', right: '15px', background: '#f3f4f6',
                    border: 'none', borderRadius: '50%', width: '35px', height: '35px',
                    cursor: 'pointer', fontWeight: 'bold', fontSize: '20px'
                }}>&times;</button>
                <img src={car.image} style={{ width: '100%', height: '400px', objectFit: 'cover' }} />
                <div style={{ padding: '30px' }}>
                    <h2 style={{ fontSize: '32px', color: '#111', margin: '0 0 10px 0' }}>{car.name} ({car.year})</h2>
                    <p style={{ color: '#2563eb', fontWeight: 'bold', marginBottom: '15px' }}>{car.manufacturer}</p>
                    <p style={{ color: '#444', lineHeight: '1.6', fontSize: '16px' }}>{car.description}</p>
                </div>
            </div>
        </div>
    );
};

// 2. CARD COMPONENT (The Gallery Item)
const CarCard = ({ car, onOpen }) => (
    <div style={{
        backgroundColor: 'white', borderRadius: '12px', overflow: 'hidden',
        boxShadow: '0 4px 6px rgba(0,0,0,0.1)', border: '1px solid #e5e7eb',
        display: 'flex', flexDirection: 'column'
    }}>
        {/* This height: 220px and objectFit: cover fixes the "Large Photo" issue */}
        <div style={{ height: '220px', width: '100%', overflow: 'hidden' }}>
            <img src={car.image} style={{ width: '100%', height: '100%', objectFit: 'cover' }} />
        </div>
        <div style={{ padding: '20px', flexGrow: 1 }}>
            <h3 style={{ fontSize: '20px', fontWeight: '800', color: '#111', margin: '0 0 5px 0' }}>{car.name}</h3>
            <p style={{ color: '#666', fontSize: '14px', marginBottom: '15px' }}>{car.manufacturer}</p>
            <button 
                onClick={() => onOpen(car)}
                style={{
                    width: '100%', padding: '12px', backgroundColor: '#2563eb', color: 'white',
                    border: 'none', borderRadius: '8px', cursor: 'pointer', fontWeight: 'bold'
                }}
            >
                View Details
            </button>
        </div>
    </div>
);

// 3. MAIN APP COMPONENT
function App() {
    const [cars, setCars] = useState([]);
    const [selectedCar, setSelectedCar] = useState(null);

    useEffect(() => {
        fetch('/api/cars')
            .then(res => res.json())
            .then(data => setCars(data));
    }, []);

    return (
        <div style={{ 
            backgroundColor: '#f9fafb', minHeight: '100vh', padding: '60px 20px',
            fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif'
        }}>
            <div style={{ maxWidth: '1200px', margin: '0 auto' }}>
                <header style={{ marginBottom: '50px' }}>
                    <h1 style={{ fontSize: '42px', fontWeight: '900', color: '#111', margin: 0 }}>
                        Car Collection Gallery
                    </h1>
                    <div style={{ width: '60px', height: '5px', backgroundColor: '#2563eb', marginTop: '15px' }}></div>
                </header>

                {/* THE GRID: This is what fixes the "one per line" issue */}
                <div style={{
                    display: 'grid',
                    gridTemplateColumns: 'repeat(auto-fill, minmax(320px, 1fr))',
                    gap: '30px'
                }}>
                    {cars.map(car => (
                        <CarCard key={car.id} car={car} onOpen={setSelectedCar} />
                    ))}
                </div>
            </div>

            <CarModal car={selectedCar} onClose={() => setSelectedCar(null)} />
        </div>
    );
}

const container = document.getElementById('app');
if (container) {
    const root = createRoot(container);
    root.render(<App />);
}