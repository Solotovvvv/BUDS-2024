const Store = artifacts.require("Store");

module.exports = function (deployer) {
  const deployerAccount = "0x2C6D0f0C14f2120703500819974F2E29edc17b30"; // Replace with your account
  deployer.deploy(Store, { from: deployerAccount });
};
