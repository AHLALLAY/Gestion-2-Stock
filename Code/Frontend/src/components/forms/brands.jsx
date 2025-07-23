function Brands() {
    return (
        <div>
            <div className="bg-white p-6 rounded-lg shadow">
                <form className="space-y-4">
                    <div className="flex justify-between items-center">
                        <div>
                            <h2 className="text-xl font-bold text-primary">New Brande</h2>
                        </div>
                        <button
                            type="button"
                            className="w-10 h-10 rounded-full text-gray-600 hover:text-danger transition-colors"
                        >
                            ×
                        </button>
                    </div>
                    <div className="space-y-2">
                        <label className="block text-sm font-medium text-gray-700">Brand's Name</label>
                        <input
                            type="text"
                            className="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"
                        />
                    </div>
                    <div className="flex space-x-3 pt-2">
                        <button
                            type="submit"
                            className="inline-flex justify-center rounded-md border border-transparent bg-primary py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2"
                        >
                            Save
                        </button>
                        <button
                            type="button"
                            className="inline-flex justify-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-secondary focus:ring-offset-2"
                        >
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    );
}

export default Brands;