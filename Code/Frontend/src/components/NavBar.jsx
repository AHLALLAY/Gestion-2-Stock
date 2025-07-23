import { Outlet, Link } from 'react-router-dom'

export default function Layout() {

  const toggelMenu = () => {
    const menu = document.getElementById('menu');
    menu.classList.toggle('hidden');
  }

  return (
    <div className='bg-gray-500 px-4 py-2 flex justify-between'>
      <button className='bg-white rounded-lg px-4 py-1'
        onClick={toggelMenu}
      >Menu</button>
      <div id='menu' className='flex space-x-4 hidden'>
        <button className='bg-white rounded-lg px-4 py-1'>Statistiques</button>
        <button className='bg-white rounded-lg px-4 py-1'>Products</button>
        <button className='bg-white rounded-lg px-4 py-1'>Brands</button>
        <button className='bg-white rounded-lg px-4 py-1'>Models</button>
      </div>
    </div>
  )
}