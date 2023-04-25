import express, { Request, Response } from "express";
import { connect } from "mongoose"
import Product from "./Product.js";

const app = express();
await connect("mongodb://127.0.0.1:27017", { dbName: "eco" });

/* retreiving products */
app.get("/products", async (_request: Request, response: Response) => {
  const products = await Product.find();
  return response.json(products);
});

/* retreiving certain product */
app.get("/products/:id", async (request: Request, response: Response) => {
  const { id } = request.params;
  const product = await Product.findOne({ _id: id })
  return response.json(product)
});

/* Create new Product */
app.post("/products", async (request: Request, response: Response) => {
  const product = new Product({
    name: request.body.name
  })

  await product.save()

  return response.status(201).json(product)
});

/* Updating product */
app.patch("/products/:id", async (request: Request, response: Response) => {
  const { id } = request.params
  const product = await Product.findOne({ _id: id })
  return response.json(product)
});

/* Delete product */
app.delete("/products/:id", async (request: Request, response: Response) => {
  const { id } = request.params;

  const product = (await Product.findOne({ _id: id }))!
  await product.deleteOne()

  return response.json(product)
});

/* listen to product */
app.listen(3000, () => {
  console.log("The server is running on port 3000");
});
