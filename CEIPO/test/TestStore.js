const Store = artifacts.require("Store");

contract("Store", (accounts) => {
  let storeInstance;

  before(async () => {
    storeInstance = await Store.deployed();
  });

  it("should store and retrieve data", async () => {
    const id = "123";
    const businessName = "Example Business";
    const businessBranch = "Branch A";
    const ownerName = "John Doe";
    const cedula = "123456";
    const businessPermit = "BP123";
    const brgyClearance = "BC456";
    const sanitaryPermit = "SP789";
    const mayorsPermit = "MP012";

    // Store data
    await storeInstance.storeData(
      id,
      businessName,
      businessBranch,
      ownerName,
      cedula,
      businessPermit,
      brgyClearance,
      sanitaryPermit,
      mayorsPermit,
      { from: accounts[0] }
    );

    // Retrieve data
    const data = await storeInstance.getData(accounts[0]);

    assert.equal(data[0], id, "Stored ID does not match");
    assert.equal(data[1], businessName, "Stored business name does not match");
    assert.equal(data[2], businessBranch, "Stored business branch does not match");
    assert.equal(data[3], ownerName, "Stored owner name does not match");
    assert.equal(data[4], cedula, "Stored cedula does not match");
    assert.equal(data[5], businessPermit, "Stored business permit does not match");
    assert.equal(data[6], brgyClearance, "Stored brgy clearance does not match");
    assert.equal(data[7], sanitaryPermit, "Stored sanitary permit does not match");
    assert.equal(data[8], mayorsPermit, "Stored mayor's permit does not match");
    assert.isAbove(data[9].toNumber(), 0, "Timestamp should be greater than zero");
  });
});
