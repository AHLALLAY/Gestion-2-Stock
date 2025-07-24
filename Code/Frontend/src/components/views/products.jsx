import { useState, useEffect } from 'react';

function Products() {
    const [isModalOpen, setIsModalOpen] = useState(false);
    const [selectedBrand, setSelectedBrand] = useState('default');
    const [selectedModel, setSelectedModel] = useState('default');
    const [products, setProducts] = useState([]);
    const [brands, setBrands] = useState([]);
    const [models, setModels] = useState([]);
    const [isLoading, setIsLoading] = useState(true);
    const [error, setError] = useState(null);

    // Form data state
    const [formData, setFormData] = useState({
        name: '',
        brand: '',
        price: '',
        quantity: ''
    });

    // Fetch products, brands and models from API
    useEffect(() => {
        const fetchData = async () => {
            try {
                setIsLoading(true);
                
                // Fetch products
                const productsResponse = await fetch('http://127.0.0.1:8000/api/products');
                const productsData = await productsResponse.json();
                console.log(productsData);
                setProducts(productsData);
                
                // Fetch brands
                const brandsResponse = await fetch('http://127.0.0.1:8000/api/brands');
                const brandsData = await brandsResponse.json();
                setBrands(brandsData);
                
                // Fetch models
                const modelsResponse = await fetch('http://127.0.0.1:8000/api/models');
                const modelsData = await modelsResponse.json();
                setModels(modelsData);
                
                setIsLoading(false);
            } catch (err) {
                setError(err.message);
                setIsLoading(false);
            }
        };

        fetchData();
    }, []);

    const openModal = () => setIsModalOpen(true);
    const closeModal = () => setIsModalOpen(false);

    const handleInputChange = (e) => {
        const { name, value } = e.target;
        setFormData({
            ...formData,
            [name]: value
        });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        
        try {
            const response = await fetch('https://api.example.com/products', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData),
            });

            if (!response.ok) {
                throw new Error('Erreur lors de l\'ajout du produit');
            }

            const newProduct = await response.json();
            setProducts([...products, newProduct]);
            closeModal();
            setFormData({
                name: '',
                brand: '',
                price: '',
                quantity: ''
            });
        } catch (err) {
            setError(err.message);
        }
    };

    // Filter products based on selected brand and model
    const filteredProducts = products.filter(product => {
        const brandMatch = selectedBrand === 'default' || product.brand === selectedBrand;
        const modelMatch = selectedModel === 'default' || product.model === selectedModel;
        return brandMatch && modelMatch;
    });

    if (isLoading) {
        return (
            <div className="flex justify-center items-center h-64">
                <div className="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-primary"></div>
            </div>
        );
    }

    if (error) {
        return (
            <div className="bg-white rounded-xl shadow-sm p-6 text-center text-red-500">
                Erreur: {error}
            </div>
        );
    }

    return (
        <div>
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
                                    <option key={brand.id} value={brand.name}>{brand.name}</option>
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
                                    <option key={model.id} value={model.name}>{model.name}</option>
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

            {/* Table des produits */}
            <div className="bg-white rounded-xl shadow-sm overflow-hidden">
                <div className="px-6 py-4 border-b border-gray-200">
                    <h2 className="text-lg font-semibold text-grayDark">Liste des produits</h2>
                </div>
                
                {filteredProducts.length > 0 ? (
                    <div className="overflow-x-auto">
                        <table className="min-w-full divide-y divide-gray-200">
                            <thead className="bg-gray-50">
                                <tr>
                                    <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                                    <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Marque</th>
                                    <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Modèle</th>
                                    <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prix</th>
                                    <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                                </tr>
                            </thead>
                            <tbody className="bg-white divide-y divide-gray-200">
                                {filteredProducts.map(product => (
                                    <tr key={product.id}>
                                        <td className="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{product.name}</td>
                                        <td className="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{product.brand}</td>
                                        <td className="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{product.model}</td>
                                        <td className="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{product.price} €</td>
                                        <td className="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{product.quantity}</td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    </div>
                ) : (
                    <div className="p-6">
                        <div className="text-center py-12 text-gray-500">
                            <div className="text-4xl mb-4">📦</div>
                            <p className="text-lg">Aucun produit trouvé</p>
                            <p className="text-sm">Commencez par ajouter votre premier produit</p>
                        </div>
                    </div>
                )}
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
                                        name="name"
                                        value={formData.name}
                                        onChange={handleInputChange}
                                        required
                                        className="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
                                        placeholder="Ex: iPhone 15 Pro"
                                    />
                                </div>

                                <div>
                                    <label className="block text-sm font-medium text-gray-700 mb-2">
                                        Marque
                                    </label>
                                    <select
                                        name="brand"
                                        value={formData.brand}
                                        onChange={handleInputChange}
                                        required
                                        className="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
                                    >
                                        <option value="">Sélectionnez une marque</option>
                                        {brands.map(brand => (
                                            <option key={brand.id} value={brand.name}>{brand.name}</option>
                                        ))}
                                    </select>
                                </div>

                                <div>
                                    <label className="block text-sm font-medium text-gray-700 mb-2">
                                        Modèle
                                    </label>
                                    <select
                                        name="model"
                                        value={formData.model}
                                        onChange={handleInputChange}
                                        required
                                        className="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
                                    >
                                        <option value="">Sélectionnez un modèle</option>
                                        {models.map(model => (
                                            <option key={model.id} value={model.name}>{model.name}</option>
                                        ))}
                                    </select>
                                </div>

                                <div>
                                    <label className="block text-sm font-medium text-gray-700 mb-2">
                                        Prix
                                    </label>
                                    <input
                                        type="number"
                                        name="price"
                                        value={formData.price}
                                        onChange={handleInputChange}
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
                                        name="quantity"
                                        value={formData.quantity}
                                        onChange={handleInputChange}
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