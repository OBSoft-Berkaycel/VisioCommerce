import logo from './logo.svg';
import './App.css';
import { useSelector, useDispatch } from 'react-redux'
import { getList, selectItem } from './features/shoppingList'

function App() {
  const list = useSelector((state) => state.list)
  const selectedList = useSelector((state) => state.selectedList)
  const dispatch = useDispatch()
  return (
    // <div className="App">
    //   <header className="App-header">
    //     <img src={logo} className="App-logo" alt="logo" />
    //     <p>
    //       Edit <code>src/App.js</code> and save to reload.
    //     </p>
    //     <a
    //       className="App-link"
    //       href="https://reactjs.org"
    //       target="_blank"
    //       rel="noopener noreferrer"
    //     >
    //       Learn React Buddy!
    //     </a>
    //   </header>
    // </div>

    <div>
      <div>
        <button
          aria-label="Increment value"
          onClick={() => dispatch(getList())}
        >
          Increment
        </button>
        <span>List length: {list?.length}</span>
        <button
          aria-label="Decrement value"
          onClick={() => dispatch(selectItem({"id" : 3, "name" : "soğan", "price" : 8}))}
        >
          Decrement
        </button>
        <span>selectedList length {selectedList?.length}</span>
      </div>
    </div>
  );
}

export default App;
