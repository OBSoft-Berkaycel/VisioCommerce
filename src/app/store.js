import { configureStore } from '@reduxjs/toolkit'
import shoppingListReducer from '../features/shoppingList'

export default configureStore({
  reducer: {
    shoppingList: shoppingListReducer 
  },
})