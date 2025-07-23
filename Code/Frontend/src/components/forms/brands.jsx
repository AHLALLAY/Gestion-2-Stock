function Brands(){
    return (
        <div>
            <form>
                <div className="flex justify-between">
                    <div>
                        <h2 className="text-gray-700">New Brand</h2>
                    </div>
                    <div className="w-10 h-10 rounded-full text-gray-600 hover:text-red-600">&timee;</div>
                </div>
                <div>
                    <label>Brand's name</label>
                    <input type="text" />
                </div>
                <div>
                    <button>Save</button>
                    <button>Cancel</button>
                </div>
            </form>
        </div>
    );
}

export default Brands;