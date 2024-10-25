import './App.css';
import { useSelector, useDispatch } from 'react-redux';
import { getList, addItem, togglePurchased, updateQuantity } from './features/shoppingList';
import { useState } from 'react';

function App() {
  const list = useSelector((state) => state.list);
  const selectedList = useSelector((state) => state.selectedList);
  const dispatch = useDispatch();

  const [newItem, setNewItem] = useState({ id: null, name: '', price: 0 });

  const handleAddItem = () => {
    if (newItem.name && newItem.price > 0) {
      dispatch(addItem({ ...newItem, id: list.length + 1 }));
      setNewItem({ id: null, name: '', price: 0 });
    }
  };

  return (
    <div>
      <div>
        <button
          aria-label="Get List"
          onClick={() => dispatch(getList())}
        >
          Get List
        </button>
        <span>List length: {list?.length}</span>
      </div>

      <div>
        <input
          type="text"
          placeholder="Product Name"
          value={newItem.name}
          onChange={(e) => setNewItem({ ...newItem, name: e.target.value })}
        />
        <input
          type="number"
          placeholder="Price"
          value={newItem.price}
          onChange={(e) => setNewItem({ ...newItem, price: Number(e.target.value) })}
        />
        <button onClick={handleAddItem}>Add Item</button>
      </div>

      <h2>Shopping List</h2>
      <ul>
        {list.map((item) => (
          <li key={item.id}>
            <input
              type="checkbox"
              checked={item.purchased}
              onChange={() => dispatch(togglePurchased(item.id))}
            />
            {item.name} - ${item.price} (Qty: {item.quantity})
            <input
              type="number"
              min="1"
              value={item.quantity}
              onChange={(e) => dispatch(updateQuantity({ id: item.id, quantity: Number(e.target.value) }))}
            />
          </li>
        ))}
      </ul>

      <h3>Selected List</h3>
      <span>selectedList length: {selectedList?.length}</span>
    </div>
  );
}

export default App;
