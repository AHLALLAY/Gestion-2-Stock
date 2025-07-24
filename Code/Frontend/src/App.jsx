import { Routes, Route, useNavigate } from 'react-router-dom';
import Products from './components/views/products';

function NavBar() {
  const navigate = useNavigate();

  const goTo = (path) => {
    navigate('/' + path);
  };

  return (
    <nav className="bg-white shadow-sm border-b border-gray-200">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="flex justify-between items-center h-16">
          {/* Logo/Titre */}
          <div className="flex items-center">
            <h1 className="text-xl font-bold text-primary">StockManager</h1>
          </div>
          
          {/* Navigation */}
          <div className="flex space-x-4">
            <button 
              onClick={() => goTo('')} 
              className="px-4 py-2 text-sm font-medium text-gray-700 hover:text-primary hover:bg-grayLight rounded-lg transition-colors duration-200"
            >
              Produits
            </button>
            <button 
              className="px-4 py-2 text-sm font-medium text-gray-700 hover:text-primary hover:bg-grayLight rounded-lg transition-colors duration-200"
            >
              Stock
            </button>
            <button 
              className="px-4 py-2 text-sm font-medium text-gray-700 hover:text-primary hover:bg-grayLight rounded-lg transition-colors duration-200"
            >
              Rapports
            </button>
          </div>
        </div>
      </div>
    </nav>
  );
}

function App() {
  return (
    <div className="min-h-screen bg-grayLight">
      <NavBar />
      <main className="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <Routes>
          <Route path="/" element={<Products />} />
        </Routes>
      </main>
    </div>
  );
}

export default App;