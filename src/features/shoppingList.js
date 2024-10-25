import { createSlice } from '@reduxjs/toolkit'

export const shoppingListSlice = createSlice({
  name: 'shoppingList',
  initialState: {
    list: [],
    selectedList: []
  },
  reducers: {
    getList: (state) => {

        console.log("getList fired!");
      state.list = [
            {"id" : 1, "name" : "domates", "price" : 10},
            {"id" : 2, "name" : "patates", "price" : 6},
            {"id" : 3, "name" : "soğan", "price" : 8}
        ]
    },
    selectItem: (state, action) => {
        console.log("select Item fired!"+ JSON.stringify(action,null,2));
        state.selectedList.push(action.payload) 
    },
  },
})

// Action creators are generated for each case reducer function
export const { getList, selectItem } = shoppingListSlice.actions

export default shoppingListSlice.reducer