import { model, Schema } from "mongoose";

const productSchema = new Schema({
  name: String
})

export default model("Product", productSchema)
