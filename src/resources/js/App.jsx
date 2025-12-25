import React, { useState, useEffect } from 'react';

export default function App() {
    const [cars, setCars] = useState([]);
    const [selectedCar, setSelectedCar] = useState(null);
    const [relatedCars, setRelatedCars] = useState([]);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        fetch('/data/get-top-cars')
            .then(res => res.json())
            .then(data => {
                setCars(data);
                setLoading(false);
            });
    }, []);

    const handleViewDetails = (id) => {
        setLoading(true);
        fetch(`/data/get-car/${id}`)
            .then(res => res.json())
            .then(data => {
                setSelectedCar(data);
                return fetch(`/data/get-related-cars/${id}`);
            })
            .then(res => res.json())
            .then(relatedData => {
                setRelatedCars(relatedData);
                setLoading(false);
            })
            .catch(() => setLoading(false));
    };

    if (loading) return <div className="p-20 text-center text-2xl font-bold text-slate-600">Loading...</div>;

    if (selectedCar) {
        return (
            <div className="min-h-screen bg-white">
                <nav className="p-6 border-b">
                    <button 
                        onClick={() => { setSelectedCar(null); setRelatedCars([]); }} 
                        className="text-blue-600 font-bold flex items-center gap-2"
                    >
                        ← Back to Gallery
                    </button>
                </nav>
                <div className="max-w-5xl mx-auto p-8">
                    <div className="flex flex-col md:flex-row gap-12 mb-16">
                        <img src={selectedCar.image} className="w-full md:w-1/2 rounded-3xl shadow-xl object-cover" alt={selectedCar.name} />
                        <div className="flex-1">
                            <span className="text-blue-500 font-extrabold uppercase tracking-widest">{selectedCar.manufacturer}</span>
                            <h1 className="text-6xl font-black text-slate-900 mt-2 mb-4">{selectedCar.name}</h1>
                            <p className="text-2xl text-slate-400 mb-8">{selectedCar.year}</p>
                            <div className="bg-slate-50 p-6 rounded-2xl border-l-4 border-blue-500">
                                <h3 className="font-bold text-slate-800 mb-2">Description</h3>
                                <p className="text-slate-600 leading-loose text-lg">{selectedCar.description}</p>
                            </div>
                        </div>
                    </div>

                    {relatedCars.length > 0 && (
                        <div className="border-t pt-12">
                            <h3 className="text-2xl font-bold mb-6 text-slate-800">More from {selectedCar.manufacturer}</h3>
                            <div className="grid grid-cols-1 md:grid-cols-4 gap-6">
                                {relatedCars.map(rcar => (
                                    <div key={rcar.id} 
                                         onClick={() => handleViewDetails(rcar.id)}
                                         className="cursor-pointer group">
                                        <img src={rcar.image} className="rounded-xl h-32 w-full object-cover mb-2 group-hover:opacity-75 transition" alt={rcar.name} />
                                        <h4 className="font-bold text-slate-700 group-hover:text-blue-600">{rcar.name}</h4>
                                    </div>
                                ))}
                            </div>
                        </div>
                    )}
                </div>
            </div>
        );
    }

    return (
        <div className="min-h-screen bg-slate-50">
            <header className="bg-slate-900 text-white py-12 px-6 text-center shadow-2xl">
                <h1 className="text-5xl font-black tracking-tighter">PREMIUM SHOWCASE</h1>
                <p className="text-slate-400 mt-2">Discover our curated collection of elite vehicles</p>
            </header>
            
            <main className="container mx-auto px-4 py-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                {cars.map(car => (
                    <div key={car.id} className="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition-all border border-slate-100 group">
                        <div className="relative overflow-hidden">
                            <img src={car.image} className="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500" alt={car.name} />
                        </div>
                        <div className="p-8">
                            <p className="text-xs font-black text-blue-600 uppercase mb-1">{car.manufacturer}</p>
                            <h2 className="text-2xl font-bold text-slate-800">{car.name}</h2>
                            <p className="text-slate-500 text-sm mt-3 line-clamp-2">{car.description}</p>
                            <button 
                                onClick={() => handleViewDetails(car.id)}
                                className="mt-8 w-full py-4 bg-slate-900 text-white rounded-2xl font-bold hover:bg-blue-600 transition-colors"
                            >
                                Explorer Details
                            </button>
                        </div>
                    </div>
                ))}
            </main>
        </div>
    );
}