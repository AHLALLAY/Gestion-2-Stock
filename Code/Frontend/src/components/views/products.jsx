import { useState } from 'react';

function Products() {
    const [isModalOpen, setIsModalOpen] = useState(false);
    const [selectedBrand, setSelectedBrand] = useState('default');
    const [selectedModel, setSelectedModel] = useState('default');

    // Données d'exemple
    const brands = ['Apple', 'Samsung', 'Huawei', 'Xiaomi'];
    const models = ['iPhone 15', 'Galaxy S24', 'P60 Pro', 'Mi 13'];

    const openModal = () => setIsModalOpen(true);
    const closeModal = () => setIsModalOpen(false);

    const handleSubmit = (e) => {
        e.preventDefault();
        // Logique pour sauvegarder
        console.log('Nouveau produit ajouté');
        closeModal();
    };

    return (
        <div>
            {/* En-tête */}
            <div className="mb-8">
                <h1 className="text-3xl font-bold text-grayDark mb-2">Gestion des Produits</h1>
                <p className="text-gray-600">Gérez vos produits et votre inventaire</p>
            </div>

            {/* Section de filtres et actions */}
            <div className="bg-white rounded-xl shadow-sm p-6 mb-6">
                <div className="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-4">
                    {/* Filtres */}
                    <div className="flex flex-col sm:flex-row gap-4">
                        <div className="flex flex-col">
                            <label htmlFor="brand" className="text-sm font-medium text-gray-700 mb-2">
                                Marque
                            </label>
                            <select 
                                id="brand" 
                                value={selectedBrand}
                                onChange={(e) => setSelectedBrand(e.target.value)}
                                className="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
                            >
                                <option value="default">Toutes les marques</option>
                                {brands.map(brand => (
                                    <option key={brand} value={brand}>{brand}</option>
                                ))}
                            </select>
                        </div>
                        
                        <div className="flex flex-col">
                            <label htmlFor="model" className="text-sm font-medium text-gray-700 mb-2">
                                Modèle
                            </label>
                            <select 
                                id="model"
                                value={selectedModel}
                                onChange={(e) => setSelectedModel(e.target.value)}
                                className="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
                            >
                                <option value="default">Tous les modèles</option>
                                {models.map(model => (
                                    <option key={model} value={model}>{model}</option>
                                ))}
                            </select>
                        </div>
                    </div>

                    {/* Bouton d'action */}
                    <button 
                        onClick={openModal}
                        className="bg-primary hover:bg-blue-700 text-white font-medium px-6 py-2 rounded-lg transition-colors duration-200 flex items-center gap-2"
                    >
                        <span className="text-lg">+</span>
                        Ajouter un produit
                    </button>
                </div>
            </div>

            {/* Table des produits (placeholder) */}
            <div className="bg-white rounded-xl shadow-sm overflow-hidden">
                <div className="px-6 py-4 border-b border-gray-200">
                    <h2 className="text-lg font-semibold text-grayDark">Liste des produits</h2>
                </div>
                <div className="p-6">
                    <div className="text-center py-12 text-gray-500">
                        <div className="text-4xl mb-4">📦</div>
                        <p className="text-lg">Aucun produit trouvé</p>
                        <p className="text-sm">Commencez par ajouter votre premier produit</p>
                    </div>
                </div>
            </div>

            {/* Modal */}
            {isModalOpen && (
                <div className="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
                    <div className="bg-white rounded-xl shadow-xl max-w-md w-full max-h-[90vh] overflow-y-auto">
                        <div className="p-6">
                            {/* En-tête du modal */}
                            <div className="flex justify-between items-center mb-6">
                                <h2 className="text-xl font-bold text-grayDark">Nouveau Produit</h2>
                                <button
                                    onClick={closeModal}
                                    className="text-gray-400 hover:text-gray-600 text-2xl transition-colors"
                                >
                                    ×
                                </button>
                            </div>

                            {/* Formulaire */}
                            <form onSubmit={handleSubmit} className="space-y-4">
                                <div>
                                    <label className="block text-sm font-medium text-gray-700 mb-2">
                                        Nom du produit
                                    </label>
                                    <input
                                        type="text"
                                        required
                                        className="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
                                        placeholder="Ex: iPhone 15 Pro"
                                    />
                                </div>

                                <div>
                                    <label className="block text-sm font-medium text-gray-700 mb-2">
                                        Marque
                                    </label>
                                    <input
                                        type="text"
                                        required
                                        className="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
                                        placeholder="Ex: Apple"
                                    />
                                </div>

                                <div>
                                    <label className="block text-sm font-medium text-gray-700 mb-2">
                                        Prix
                                    </label>
                                    <input
                                        type="number"
                                        required
                                        step="0.01"
                                        className="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
                                        placeholder="0.00"
                                    />
                                </div>

                                <div>
                                    <label className="block text-sm font-medium text-gray-700 mb-2">
                                        Quantité en stock
                                    </label>
                                    <input
                                        type="number"
                                        required
                                        min="0"
                                        className="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
                                        placeholder="0"
                                    />
                                </div>

                                {/* Boutons */}
                                <div className="flex gap-3 pt-4">
                                    <button
                                        type="submit"
                                        className="flex-1 bg-primary hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200"
                                    >
                                        Sauvegarder
                                    </button>
                                    <button
                                        type="button"
                                        onClick={closeModal}
                                        className="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-4 rounded-lg transition-colors duration-200"
                                    >
                                        Annuler
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            )}
        </div>
    );
}

export default Products;