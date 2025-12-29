import './bootstrap';
import React, { useState, useEffect } from 'react';
import ReactDOM from 'react-dom/client';

function PublicGallery() {
    const [cars, setCars] = useState([]);

    useEffect(() => {
        fetch('/data/cars')
            .then(res => res.json())
            .then(data => setCars(data))
            .catch(err => console.error("Error:", err));
    }, []);

    return (
        <div className="container mt-4">
            <div className="row">
                {cars.map(car => (
                    <div key={car.id} className="col-md-4 mb-4">
                        <div className="card shadow-sm h-100">
                            <img src={car.image} className="card-img-top" alt={car.car_name} style={{ height: '200px', objectFit: 'cover' }} />
                            <div className="card-body">
                                {/* This line now displays: S-Class S580 */}
                                <h5 className="card-title text-primary fw-bold">
                                    {car.car_name} <span className="text-dark small">{car.model}</span>
                                </h5>
                                <p className="text-muted small mb-2">
                                    {car.manufacturer?.name} • {car.car_type?.name}
                                </p>
                                <p className="card-text small text-secondary">{car.description}</p>
                            </div>
                            <div className="card-footer bg-white border-0 text-end">
                                <span className="badge bg-dark">{car.year}</span>
                            </div>
                        </div>
                    </div>
                ))}
            </div>
        </div>
    );
}

const root = document.getElementById('public-app');
if (root) {
    ReactDOM.createRoot(root).render(<PublicGallery />);
}