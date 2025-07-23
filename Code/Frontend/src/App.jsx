import { Routes, Route, useNavigate } from 'react-router-dom';
import Products from './components/views/products';
import Brands from './components/forms/brands';

function NavBar() {
  const navigate = useNavigate();

  const toggleMenu = () => {
    const menu = document.getElementById('menu');
    menu.classList.toggle('hidden');
  };

  const goTo = (path) => {
    navigate('/' + path);
  };

  return (
    <div className='bg-gray-500 px-4 py-2 flex justify-between'>
      <button className='bg-white rounded-lg px-4 py-1' onClick={toggleMenu}>
        Menu
      </button>
      <div id='menu' className='flex space-x-4 hidden'>
        <button onClick={() => goTo('')} className='bg-white rounded-lg px-4 py-1'>
          Accueil
        </button>
        <button onClick={() => goTo('products')} className='bg-white rounded-lg px-4 py-1'>
          Products
        </button>
        <button onClick={() => goTo('brands')} className='bg-white rounded-lg px-4 py-1'>
          Brands
        </button>
      </div>
    </div>
  );
}

function App() {
  return (
    <div>
      <NavBar />
      <Routes>
        <Route path="/" element={<Products />} />
        <Route path="/products" element={<Products />} />
        <Route path="/brands" element={<Brands />} />
      </Routes>
    </div>
  );
}

export default App;