import pandas as pd

item_names = pd.read_csv("itemname_data", engine="python")

def get_item_names():
    return item_names.index
