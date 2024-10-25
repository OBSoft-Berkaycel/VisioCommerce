import { createSlice, createAsyncThunk } from '@reduxjs/toolkit';
import axios from 'axios';

const API_URL = 'http://localhost:8000/v1/shopping-list'; 

export const getList = createAsyncThunk('shoppingList/getList', async () => {
  const response = await axios.get(`${API_URL}/listAll`);
  return response.data;
});

export const addItem = createAsyncThunk('shoppingList/addItem', async (item) => {
  const response = await axios.post(`${API_URL}/addNewItem`, item);
  return response.data;
});

export const togglePurchased = createAsyncThunk('shoppingList/togglePurchased', async (id) => {
  const response = await axios.put(`${API_URL}/update`, { id });
  return response.data;
});

const shoppingListSlice = createSlice({
  name: 'shoppingList',
  initialState: {
    list: [],
    selectedList: [],
    status: 'idle',
    error: null,
  },
  reducers: {
    selectItem: (state, action) => {
      console.log("select Item fired!" + JSON.stringify(action, null, 2));
      state.selectedList.push(action.payload);
    },
    updateQuantity: (state, action) => {
      const item = state.list.find(item => item.id === action.payload.id);
      if (item) {
        item.quantity = action.payload.quantity;
      }
    }
  },
  extraReducers: (builder) => {
    builder
      .addCase(getList.fulfilled, (state, action) => {
        state.list = action.payload;
      })
      .addCase(addItem.fulfilled, (state, action) => {
        state.list.push(action.payload);
      })
      .addCase(togglePurchased.fulfilled, (state, action) => {
        const item = state.list.find(item => item.id === action.payload.id);
        if (item) {
          item.purchased = !item.purchased;
        }
      });
  },
});

export const { selectItem, updateQuantity } = shoppingListSlice.actions;

export default shoppingListSlice.reducer;
