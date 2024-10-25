import { createSlice, createAsyncThunk } from '@reduxjs/toolkit';
import axios from 'axios';

const API_URL = 'http://localhost:8000/v1/shopping-list'; // API URL'ini buraya ekleyin

export const getList = createAsyncThunk('shoppingList/getList', async () => {
  const response = await axios.get(`${API_URL}/listAll`);
  return response.data; // API'den gelen yanıtı döndür
});

export const addItem = createAsyncThunk('shoppingList/addItem', async (item) => {
  const response = await axios.post(`${API_URL}/addNewItem`, item);
  return response.data; // API'den gelen yanıtı döndür
});

export const togglePurchased = createAsyncThunk('shoppingList/togglePurchased', async (id) => {
  const response = await axios.put(`${API_URL}/update`, { id });
  return response.data; // API'den gelen yanıtı döndür
});

const shoppingListSlice = createSlice({
  name: 'shoppingList',
  initialState: {
    list: [],
    selectedList: [],
    status: 'idle', // Async durumunu takip etmek için
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
        state.list = action.payload; // API'den alınan veriyi state'e ekle
      })
      .addCase(addItem.fulfilled, (state, action) => {
        state.list.push(action.payload); // Yeni ürünü listeye ekle
      })
      .addCase(togglePurchased.fulfilled, (state, action) => {
        const item = state.list.find(item => item.id === action.payload.id);
        if (item) {
          item.purchased = !item.purchased; // Satın alındı durumunu değiştir
        }
      });
  },
});

export const { selectItem, updateQuantity } = shoppingListSlice.actions;

export default shoppingListSlice.reducer;
